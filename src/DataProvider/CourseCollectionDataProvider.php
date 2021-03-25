<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Course;
use App\Repository\CourseData\CourseDataInterface;
use Exception;
use RuntimeException;

class CourseCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var CourseDataInterface
     */
    private $repository;

    public function __construct(CourseDataInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        try {
            $collection = $this->repository->getCourseList();
        } catch (Exception $e) {
            throw new RuntimeException(sprintf('Unable to retrieve levels: %s', $e->getMessage()));
        }

        return $collection;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Course::class === $resourceClass;
    }
}