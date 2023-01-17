<?php

namespace App\Service\Contracts;

interface QueueSenderInterface
{
    /**
     * @param string $message
     */
    public function sendMessage(string $message): void;
}