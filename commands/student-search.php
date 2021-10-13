<?php

use Project\Doctrine\Entity\Phone;
use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $phones = $student->getPhones()->map(function(Phone $phone){
        return $phone->getNumber();
    })->toArray();
    
    echo "Phones: " . implode(',', $phones);
    echo "ID: {$student->getId()}\nName: {$student->getName()}\n\n";
}
