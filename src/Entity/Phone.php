<?php

namespace Project\Doctrine\Entity;

/**
 * @Entity
 */
class Phone
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
    private string $number;

    /**
     * @ManyToOne(targetEntity="Student")
    */
    private $student;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self 
    {
        $this->id = $id;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getStudent(Student $student): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }
}