<?php

namespace App\Repositories\Interfaces;

interface TransactionRepositoryInterface
{
    public function persist(array $data);
}
