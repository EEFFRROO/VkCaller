<?php


interface SocialNetworkInterface
{
    /**
     * @return array
     */
    public function getAllFriends(): array;

    /**
     * @param int $id
     * @return bool
     */
    public function getIsOnlineById(int $id): bool;
}