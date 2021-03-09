<?php


namespace App\Repository\SectionData;


use App\Entity\Section;
use RuntimeException;

final class SectionDataRepository implements SectionDataInterface
{
    private const DATA_SOURCE = 'sections.json';

    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function getFromJson(): array
    {
        $i = 0;
        foreach($this->getFileAsArray() as $p){
            $section = new Section();
            $section->id = $p['name'];
            $section->setName($p['name']);
            $section->setAbr($p['abr']);

            $sections[$i] = $section;

            $i++;
        }

        return $sections ?? [];
    }

    private function getFileAsArray(): array
    {
        $filePath = $this->projectDir.'./data/'.self::DATA_SOURCE;
        if(!is_file($filePath)){
            throw new RuntimeException(sprintf("Can't find data source: %s", $filePath));
        }

        $file = file_get_contents($filePath);

        $json_data = json_decode($file, true);

        if(!is_array($json_data)){
            throw new RuntimeException(sprintf("Can't load data source: %s", $filePath));
        }

        return $json_data;
    }

    public function getSectionList(): array
    {
        return $this->getFromJson();
    }
}