<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Level;
use App\Repository\LevelData\LevelDataInterface;
use Exception;
use RuntimeException;

class LevelCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var LevelDataInterface
     */
    private $repository;

    public function __construct(LevelDataInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        try {
            $collection = $this->repository->getLevelList();
        } catch (Exception $e) {
            throw new RuntimeException(sprintf('Unable to retrieve levels: %s', $e->getMessage()));
        }

        return $collection;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Level::class === $resourceClass;
    }
}