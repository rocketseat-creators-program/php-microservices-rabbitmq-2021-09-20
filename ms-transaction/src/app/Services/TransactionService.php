<?php

namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Services\Interfaces\TransactionServiceInterface;
use App\Enums\Messages;

class TransactionService implements TransactionServiceInterface
{
    public function __construct(private TransactionRepositoryInterface $repository)
    {
    }

    public function process(array $data): string
    {
        $transaction = $this->repository->persist($data);

        $this->sendNotification($transaction['payee']);

        return Messages::TRANSACTION_SUCCESSFULLY;
    }

    private function sendNotification(int $payee)
    {
        return true;
    }
}
