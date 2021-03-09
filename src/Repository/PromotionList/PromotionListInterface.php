<?php


namespace App\Repository\PromotionList;

use App\Entity\Promotion;


interface PromotionListInterface
{
    /**
     * @return array<int, Promotion>
     */
    public function getPromotionList(): array;
}