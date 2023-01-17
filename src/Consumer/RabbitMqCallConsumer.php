<?php


namespace App\Consumer;


use App\Service\ResultService;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqCallConsumer implements ConsumerInterface
{
    private ResultService $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    /**
     * @param AMQPMessage $msg
     * @return bool|int
     */
    public function execute(AMQPMessage $msg)
    {
        try {
            $this->resultService->getCallResult((int)$msg->getBody());
        } catch (\Exception $exception) {
            return ConsumerInterface::MSG_REJECT;
        }
        return ConsumerInterface::MSG_ACK;
    }
}