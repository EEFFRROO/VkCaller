<?php


interface QueueSenderInterface
{
    /**
     * @param $message
     */
    public function sendMessage($message): void;
}