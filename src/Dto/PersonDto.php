<?php


namespace App\Dto;


class PersonDto
{
    private int $vkId;

    /**
     * @return int
     */
    public function getVkId(): int
    {
        return $this->vkId;
    }

    /**
     * @param int $vkId
     */
    public function setVkId(int $vkId): void
    {
        $this->vkId = $vkId;
    }
}