<?php

namespace Project\Doctrine\Entity;

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
}