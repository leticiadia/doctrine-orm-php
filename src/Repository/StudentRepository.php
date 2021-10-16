<?php

namespace Project\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Project\Doctrine\Entity\Student;

class StudentRepository extends EntityRepository
{
    public function lookingCoursesByStudent() { 
        $qb = $this->createQueryBuilder('s')
        ->join('s.phones', 'p')
        ->join('s.courses', 'c')
        ->addSelect('p')
        ->addSelect('c')
        ->getQuery();

        return $qb->getResult();
    }

    public function lookingAllStudents() {
        $entityManager = $this->getEntityManager();
       
        $classStudent = Student::class;
        $dql = "SELECT s FROM $classStudent s";
        $qb = $entityManager->createQuery($dql);

        return $qb->getResult();
    }
}
