<?php


namespace App\Controller;


use App\Repository\SchoolRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class GetSchoolPromotions
{
    private $schoolRepository;
    /**
     * @var Request|null
     */
    private $request;

    public function __construct(SchoolRepository $schoolRepository, RequestStack $requestStack)
    {
        $this->schoolRepository = $schoolRepository;
        $this->request = $requestStack->getCurrentRequest();
    }

    public function __invoke()
    {
        return $this->schoolRepository->findAll();
    }
}