<?php

namespace App\Service;

use App\Client\VkClient;
use App\Dto\PersonDto;
use App\Service\Contracts\SocialNetworkInterface;

class VkService implements SocialNetworkInterface
{
    private VkClient $vkClient;

    public function __construct(VkClient $vkClient)
    {
        $this->vkClient = $vkClient;
    }

    /**
     * @return PersonDto[]
     */
    public function getAllFriends(): array
    {
        $friends = $this->vkClient->sendGet('friends.get');
        $result = [];
        if (isset($friends['items'])) {
            foreach ($friends['items'] as $item) {
                $person = new PersonDto();
                $person->setVkId($item);
                $result[] = $person;
            }
        }

        return $result;
    }

    /**
     * @deprecated
     * @return PersonDto[]
     */
    public function getAllAvailableFriends(): array
    {
        $friends = $this->vkClient->sendGet('friends.getAvailableForCall');
        $result = [];
        if (isset($friends['items'])) {
            foreach ($friends['items'] as $item) {
                $person = new PersonDto();
                $person->setVkId($item);
                $result[] = $person;
            }
        }

        return $result;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function getIsOnlineById(int $id): bool
    {
        $result = $this->vkClient->sendGet('users.get', ['user_ids' => $id, 'fields' => 'online']);
        return (bool)$result[0]['online'];
    }
}