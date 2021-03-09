<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\School;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class SchoolDataPersister implements ContextAwareDataPersisterInterface
{
    private $_entity_manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->_entity_manager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof School;
    }

    /**
     * @inheritDoc
     */
    public function persist($data, array $context = [])
    {
        $data->setCreatedAt(new DateTimeImmutable());
        $this->_entity_manager->persist($data);

        $this->_entity_manager->flush();
        
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function remove($data, array $context = [])
    {
        // TODO: Implement remove() method.
    }
}