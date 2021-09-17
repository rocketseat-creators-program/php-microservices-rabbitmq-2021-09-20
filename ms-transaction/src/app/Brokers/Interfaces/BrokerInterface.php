<?php

namespace App\Brokers\Interfaces;

interface BrokerInterface
{
    public function sendToQueue(string $queue, array $payload): void;
}
