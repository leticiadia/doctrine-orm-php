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
     * @OneToMany(targetEntity="Phone", mappedBy="Student")
     */
    private $phones;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
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

    public function addPhone(Phone $phones)
    {
        $this->phones->add($phones);
        $phones->setStudent($this);
        return $this;
    }
}