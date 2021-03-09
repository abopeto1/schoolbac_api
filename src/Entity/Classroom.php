<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"school:read"}},
 * )
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
 *          "promotions": "exact", "school": "exact",
 *     }
 * )
 * @ORM\Entity(repositoryClass=ClassroomRepository::class)
 */
class Classroom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"school:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=School::class, inversedBy="classrooms")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"school:read"})
     */
    private $school;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"school:read"})
     */
    private $promotion;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"school:read"})
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Groups({"school:read"})
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, mappedBy="classrooms")
     * @Groups({"school:read"})
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getPromotion(): ?string
    {
        return $this->promotion;
    }

    public function setPromotion(string $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addClassroom($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            $this->students->removeElement($student);
            $student->removeClassroom($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     *
     * @Groups({"school:read"})
     */
    public function getName(): string
    {
        return $this->getLevel().' '.$this->getLabel();
    }
}
