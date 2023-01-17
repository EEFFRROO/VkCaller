<?php


namespace App\Service;


use App\Entity\Call;
use App\Repository\CallRepository;
use App\Service\Contracts\SocialNetworkInterface;

class ResultService
{
    private SocialNetworkInterface $socialNetwork;
    private CallRepository $callRepository;

    public function __construct(
        SocialNetworkInterface $socialNetwork,
        CallRepository $callRepository,
    ) {
        $this->socialNetwork = $socialNetwork;
        $this->callRepository = $callRepository;
    }

    public function getCallResult(int $vkId): string
    {
        $result = $this->socialNetwork->getIsOnlineById($vkId) ? Call::STATUS_SUCCESS : Call::STATUS_ERROR;
        $call = new Call();
        $call->setInterlocutor($vkId);
        $call->setStatus($result);
        $call->setCreatedAt(new \DateTimeImmutable());
        $this->callRepository->save($call, true);
        return $result;
    }
}