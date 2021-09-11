<?php

namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Services\Interfaces\TransactionServiceInterface;
use App\Enums\Messages;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\Transaction;

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
        $user = $this->userRepository->findById($transaction['payee']);

        dd([
            'transaction' => $transaction['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'value' => $transaction['value']
        ]);
    }
}
