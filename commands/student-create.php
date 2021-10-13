<?php

use Project\Doctrine\Entity\Phone;
use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$student = new Student();
$student->setName($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

for($i = 2; $i < $argc; $i++) {
    $phoneNumber = $argv[$i];
    $phone = new Phone();
    $phone->setNumber($phoneNumber);

    $student->addPhone($phone);
}

$entityManager->persist($student);
$entityManager->flush();