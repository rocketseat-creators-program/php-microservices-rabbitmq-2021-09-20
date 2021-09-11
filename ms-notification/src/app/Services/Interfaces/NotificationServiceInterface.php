<?php

namespace App\Services\Interfaces;

interface NotificationServiceInterface
{
    public function processMessage(array $data);
}
