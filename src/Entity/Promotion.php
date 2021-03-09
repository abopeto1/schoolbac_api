<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\GetSchoolPromotions;

/**
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=10
 *     },
 *     collectionOperations={
 *          "get"={"method"="GET"},
 *          "get_school_promotions"={
                "path"="/school/{id}/promotions",
 *              "method"="GET",
 *              "controller"=GetSchoolPromotions::class
 *          }
 *      },
 *     itemOperations={"get"}
 * )
 */
class Promotion
{
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    public $name;
}
