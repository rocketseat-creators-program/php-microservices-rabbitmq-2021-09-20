<?php

namespace App\Brokers\Interfaces;

use Closure;

interface BrokerInterface
{
    public function receiveFromQueue(string $queue, Closure $callback): void;
    public function wait(): void;
}
