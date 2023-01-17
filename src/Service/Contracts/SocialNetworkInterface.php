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
     * @param int $id
     * @return bool
     */
    public function getIsOnlineById(int $id): bool;
}