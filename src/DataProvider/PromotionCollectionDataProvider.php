<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Promotion;
use App\Repository\ClassroomRepository;
use App\Repository\PromotionList\PromotionListDataRepository;
use App\Repository\PromotionList\PromotionListInterface;
use Exception;
use RuntimeException;
use Symfony\Component\HttpFoundation\RequestStack;

class PromotionCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var PromotionListInterface
     */
    private $repository;
    /**
     * @var RequestStack
     */
    private $request;
    /**
     * @var ClassroomRepository
     */
    private $classroomRepository;

    public function __construct(
        PromotionListInterface $repository,
        RequestStack $requestStack,
        ClassroomRepository $classroomRepository
    )
    {
        $this->repository = $repository;
        $this->request = $requestStack->getCurrentRequest();
        $this->classroomRepository = $classroomRepository;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $schoolId = $this->request->get('school');

        try {
            if ($schoolId) {
                $schoolClassrooms = $this->classroomRepository->findBy(["school" => $schoolId,]);
                $promotions = array_map(function ($classroom){
                    return $classroom->getPromotion();
                }, $schoolClassrooms);

                $i=0;

                foreach (array_unique($promotions) as $p){
                    $promotion = PromotionListDataRepository::stringToPromotion($p);

                    $collection[$i] = $promotion;

                    $i++;
                }

                return $collection ?? [];
            }
            $collection = $this->repository->getPromotionList();
        } catch (Exception $e) {
            throw new RuntimeException(sprintf('Unable to retrieve promotions: %s', $e->getMessage()));
        }

        return $collection;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Promotion::class === $resourceClass;
    }
}