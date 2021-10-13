<?php

use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$student = new Student();
$student->setName('Gabriel Pensador');

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($student);
$student->setName('Gabriel O Pensador');

$entityManager->flush();