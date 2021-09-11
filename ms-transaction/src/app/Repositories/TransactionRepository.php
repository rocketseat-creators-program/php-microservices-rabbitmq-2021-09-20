<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function __construct(private Transaction $model)
    {
    }

    public function persist(array $data): Transaction
    {
        return $this->model->create($data);
    }
}
