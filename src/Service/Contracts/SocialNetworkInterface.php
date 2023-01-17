<?php

namespace App\Service\Contracts;

use App\Dto\PersonDto;

interface SocialNetworkInterface
{
    /**
     * @return PersonDto[]
     */
    public function getAllFriends(): array;

    /**
     * @return PersonDto[]
     */
    public function getAllAvailableFriends(): array;

    /**
     * @param int $id
     * @return bool
     */
    public function getIsOnlineById(int $id): bool;
}