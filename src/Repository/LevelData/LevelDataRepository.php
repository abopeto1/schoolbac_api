<?php


namespace App\Repository\LevelData;


use App\Entity\Level;
use RuntimeException;

final class LevelDataRepository implements LevelDataInterface
{
    private const DATA_SOURCE = 'levels.json';

    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function getFromJson(): array
    {
        $i = 0;
        foreach($this->getFileAsArray() as $p){
            $level = new Level();
            $level->setId($p['name']);
            $level->setName($p['name']);
            $level->setOption($p['option']);
            $level->setSection($p['section']);

            $levels[$i] = $level;

            $i++;
        }

        return $levels ?? [];
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

    public function getLevelList(): array
    {
        return $this->getFromJson();
    }
}