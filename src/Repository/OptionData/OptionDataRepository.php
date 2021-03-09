<?php


namespace App\Repository\OptionData;


use App\Entity\Option;
use App\Repository\OptionData\OptionDataInterface;
use RuntimeException;

final class OptionDataRepository implements OptionDataInterface
{
    private const DATA_SOURCE = 'options.json';

    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function getFromJson(): array
    {
        $i = 0;
        foreach($this->getFileAsArray() as $p){
            $option = new Option();
            $option->id = $p['name'];
            $option->setName($p['name']);
            $option->setAbr($p['abr']);

            $options[$i] = $option;

            $i++;
        }

        return $options ?? [];
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

    public function getOptionList(): array
    {
        return $this->getFromJson();
    }
}