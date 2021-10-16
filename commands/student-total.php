<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classStudent = Student::class;
$dql = "SELECT COUNT(s) FROM $classStudent s";
$query = $entityManager->createQuery($dql);
$studentTotal = $query->getSingleScalarResult();

echo "Student Total: " . $studentTotal[0];



