<?php

namespace App\Service;

use App\Service\Contracts\QueueSenderInterface;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class RabbitMqCallSender implements QueueSenderInterface
{
    private ProducerInterface $producer;

    public function __construct(ProducerInterface $callProducer)
    {
        $this->producer = $callProducer;
    }

    /**
     * @inheritDoc
     */
    public function sendMessage(string $message): void
    {
        $this->producer->publish($message);
    }
}