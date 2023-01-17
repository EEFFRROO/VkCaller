<?php


use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class RabbitMqSender implements QueueSenderInterface
{
    private ProducerInterface $producer;

    public function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    /**
     * @inheritDoc
     */
    public function sendMessage($message): void
    {
        $this->producer->publish($message->toString());
    }
}