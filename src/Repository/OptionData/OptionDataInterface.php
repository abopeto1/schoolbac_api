<?php


namespace App\Repository\OptionData;


use App\Entity\Option;

interface OptionDataInterface
{
    /**
     * @return array<int, Option>
     */
    public function getOptionList(): array;
}