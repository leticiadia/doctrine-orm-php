<?php

namespace Project\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
*/
class Student
{
    /**
     *  @Id
     *  @GeneratedValue
     *  @Column(type="integer")
    */
    private int $id;

    /**
     * @Column(type="string")
    */
    private string $name;

    /**
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"})
    */
    private $phones;
    
    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
    */
    private $courses;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
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

        $student = new Student();
        $student->setName('teste')->getName();
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    public function addCourse(Course $course): self
    {
        if($this->courses->contains($course)){
            return $this;
        }

        $this->courses->add($course);
        $course->addStudent($this);

        return $this;
    }

    /** @return Course[] */
    public function getCourses(): Collection
    {
        return $this->courses;
    }
}