<?php

namespace App\Service;

use App\Service\Contracts\QueueSenderInterface;
use App\Service\Contracts\SocialNetworkInterface;

class CallService
{
    private QueueSenderInterface $sender;
    private SocialNetworkInterface $socialNetwork;

    public function __construct(QueueSenderInterface $sender, SocialNetworkInterface $socialNetwork)
    {
        $this->sender = $sender;
        $this->socialNetwork = $socialNetwork;
    }

    public function callToAllFriends(): void
    {
        $friends = $this->socialNetwork->getAllFriends();
        foreach ($friends as $friend) {
            $this->sender->sendMessage($friend->getVkId());
        }
    }

    public function callToAvailableFriends(): void
    {
        $friends = $this->socialNetwork->getAllAvailableFriends();
        foreach ($friends as $friend) {
            $this->sender->sendMessage($friend->getVkId());
        }
    }

    public function callToFriend(int $friendId): void
    {
        $this->sender->sendMessage($friendId);
    }
}