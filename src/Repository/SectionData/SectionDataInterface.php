<?php


namespace App\Repository\SectionData;


use App\Entity\Section;

interface SectionDataInterface
{
    /**
     * @return array<int, Section>
     */
    public function getSectionList(): array;
}