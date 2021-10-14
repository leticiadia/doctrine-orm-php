<?php

use Project\Doctrine\Entity\Course;
use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idStudent = $argv[1];
$idCourse = $argv[2];

/** @var Course $course */
$course = $entityManager->find(Course::class, $idCourse);
/** @var Student $student */
$student = $entityManager->find(Student::class, $idStudent);

$course->addStudent($student);

$entityManager->flush();