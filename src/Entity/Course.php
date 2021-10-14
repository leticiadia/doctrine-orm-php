<?php

namespace Project\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Project\Doctrine\Entity\Student;

/**
 * @Entity
*/
class Course
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
    */
    private int $id;
    /**
     * @Column(type="string")
    */
    private string $name;

    /**
     * @ManyToMany(targetEntity="Student", inversedBy="courses")
    */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getStudent()
    {
        return $this->students;
    }

    public function addStudent(Student $student)
    {
        if($this->students->contains($student)){
            return $this;
        }

        $this->students->add($student);
        $student->addCourse($this);
        
        return $this;
    }
}