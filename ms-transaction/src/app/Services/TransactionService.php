<?php

namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Services\Interfaces\TransactionServiceInterface;
use App\Enums\Messages;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\Transaction;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class TransactionService implements TransactionServiceInterface
{
    public function __construct(
        private TransactionRepositoryInterface $repository,
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function process(array $data): string
    {
        $transaction = $this->repository->persist($data);

        $this->sendNotification($transaction);

        return Messages::TRANSACTION_SUCCESSFULLY;
    }

    private function sendNotification(Transaction $transaction): void
    {
        // $user = $this->userRepository->findById($transaction['payee']);

        $connection = new AMQPStreamConnection('172.26.0.1', 5672, 'admin', 'admin');
        $channel = $connection->channel();

        $channel->queue_declare('notification_queue2', false, false, false, false);

        $msg = new AMQPMessage('Hello, Angry World!');
        $channel->basic_publish($msg, '', 'recommendation_queue2');

        $channel->close();
        $connection->close();
    }
}
