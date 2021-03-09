<?php


namespace App\Repository\PromotionList;


use App\Entity\Promotion;
use RuntimeException;

final class PromotionListDataRepository implements PromotionListInterface
{
    private const DATA_SOURCE = 'promotions.json';

    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public static function stringToPromotion(string $string){
        $promotion = new Promotion();
        $promotion->id = $string;
        $promotion->name = $string;

        return $promotion;
    }

    public function getFromJson(): array
    {
        $i = 0;
        foreach($this->getFileAsArray() as $p){
            $promotion = self::stringToPromotion($p);

            $promotions[$i] = $promotion;

            $i++;
        }

        return $promotions ?? [];
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

    public function getPromotionList(): array
    {
        return $this->getFromJson();
    }
}