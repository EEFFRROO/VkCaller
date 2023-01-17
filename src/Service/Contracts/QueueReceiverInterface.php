<?php


interface QueueReceiverInterface
{
    public function receiveMessage(): void;
}