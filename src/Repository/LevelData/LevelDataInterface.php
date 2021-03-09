<?php


namespace App\Repository\LevelData;


use App\Entity\Level;

interface LevelDataInterface
{
    /**
     * @return array<int, Level>
     */
    public function getLevelList(): array;
}