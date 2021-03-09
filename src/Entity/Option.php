<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=10
 *     },
 *     collectionOperations={
 *          "get"={"method"="GET"},
 *      },
 *     itemOperations={"get"}
 * )
 */
class Option
{
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    private $name;

    private $abr;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAbr()
    {
        return $this->abr;
    }

    /**
     * @param mixed $abr
     */
    public function setAbr($abr): void
    {
        $this->abr = $abr;
    }
}