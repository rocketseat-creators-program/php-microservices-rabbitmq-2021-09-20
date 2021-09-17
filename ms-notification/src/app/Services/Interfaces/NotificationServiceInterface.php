<?php

namespace App\Services\Interfaces;

interface NotificationServiceInterface
{
    public function processMessage(array $data): string;
    public function send(string $payload): void;
}
