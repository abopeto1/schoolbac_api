<?php


namespace App\Repository\CourseData;


use App\Entity\Course;

interface CourseDataInterface
{
    /**
     * @return array<int, Course>
     */
    public function getCourseList(): array;
}