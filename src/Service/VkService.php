<?php

namespace App\Service;

use App\Dto\PersonDto;
use App\Service\Contracts\SocialNetworkInterface;

class VkService implements SocialNetworkInterface
{

    /**
     * @return PersonDto[]
     */
    public function getAllFriends(): array
    {
        $firstPerson = new PersonDto();
        $firstPerson->setVkId(1);
        $secondPerson = new PersonDto();
        $secondPerson->setVkId(2);

        return [
            $firstPerson,
            $secondPerson
        ];
    }

    /**
     * @param int $id
     * @return bool
     */
    public function getIsOnlineById(int $id): bool
    {
        return $id === 1;
    }
}