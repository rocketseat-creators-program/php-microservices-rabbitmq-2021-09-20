<?php

namespace App\Services\Interfaces;

interface TransactionServiceInterface
{
    public function process(array $data): string;
}
