<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

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
class Section
{
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    private $name;

    private $abr;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAbr(): ?string
    {
        return $this->abr;
    }

    public function setAbr(string $abr): self
    {
        $this->abr = $abr;

        return $this;
    }
}
