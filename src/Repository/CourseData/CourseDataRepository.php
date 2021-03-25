<?php


namespace App\Repository\CourseData;


use App\Entity\Course;
use RuntimeException;

final class CourseDataRepository implements CourseDataInterface
{
    private const DATA_SOURCE = 'courses.json';

    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function getFromJson(): array
    {
        $i = 0;
        foreach($this->getFileAsArray() as $p){
            $course = new Course();
            $course->setId($p['name']);
            $course->setName($p['name']);

            $courses[$i] = $course;

            $i++;
        }

        return $courses ?? [];
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

    public function getCourseList(): array
    {
        return $this->getFromJson();
    }
}