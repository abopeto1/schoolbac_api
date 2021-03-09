<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Option;
use App\Repository\OptionData\OptionDataInterface;
use App\Repository\SectionData\SectionDataInterface;
use Exception;
use RuntimeException;

class OptionCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var SectionDataInterface
     */
    private $repository;

    public function __construct(OptionDataInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        try {
            $collection = $this->repository->getOptionList();
        } catch (Exception $e) {
            throw new RuntimeException(sprintf('Unable to retrieve promotions: %s', $e->getMessage()));
        }

        return $collection;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Option::class === $resourceClass;
    }
}