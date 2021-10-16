<?php

use Project\Doctrine\Entity\Phone;
use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classStudent = Student::class;
$dql = "SELECT student FROM $classStudent student WHERE student.id=1 OR student.name='Gabriela Morais'";
$query = $entityManager->createQuery($dql);
/** @var Student[] $studentList */
$studentList = $query->getResult();

foreach ($studentList as $student) {
    $phones = $student->getPhones()->map(function(Phone $phone){
        return $phone->getNumber();
    })->toArray();
    
    echo "Phones: " . implode(',', $phones);
    echo "ID: {$student->getId()}\nName: {$student->getName()}\n\n";
}
