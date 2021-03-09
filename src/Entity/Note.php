<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Classroom::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classroom;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $firstPeriod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $secondPeriod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $firstExam;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $thirdPeriod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fourthPeriod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $secondExam;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getFirstPeriod(): ?float
    {
        return $this->firstPeriod;
    }

    public function setFirstPeriod(?float $firstPeriod): self
    {
        $this->firstPeriod = $firstPeriod;

        return $this;
    }

    public function getSecondPeriod(): ?float
    {
        return $this->secondPeriod;
    }

    public function setSecondPeriod(?float $secondPeriod): self
    {
        $this->secondPeriod = $secondPeriod;

        return $this;
    }

    public function getFirstExam(): ?float
    {
        return $this->firstExam;
    }

    public function setFirstExam(?float $firstExam): self
    {
        $this->firstExam = $firstExam;

        return $this;
    }

    public function getThirdPeriod(): ?float
    {
        return $this->thirdPeriod;
    }

    public function setThirdPeriod(?float $thirdPeriod): self
    {
        $this->thirdPeriod = $thirdPeriod;

        return $this;
    }

    public function getFourthPeriod(): ?float
    {
        return $this->fourthPeriod;
    }

    public function setFourthPeriod(?float $fourthPeriod): self
    {
        $this->fourthPeriod = $fourthPeriod;

        return $this;
    }

    public function getSecondExam(): ?float
    {
        return $this->secondExam;
    }

    public function setSecondExam(?float $secondExam): self
    {
        $this->secondExam = $secondExam;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
