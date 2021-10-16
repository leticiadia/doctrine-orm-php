<?php

use Doctrine\DBAL\Logging\DebugStack;
use Project\Doctrine\Entity\Phone;
use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$classStudent = Student::class;
//Lembre-se essas letras s, p e c são student, phone, course.
$dql = "SELECT s, p, c FROM $classStudent s JOIN s.phones p JOIN s.courses c";
$query = $entityManager->createQuery($dql);
/** @var Student[] $students */
$students = $query->getResult();

foreach($students as $student){
    $phones = $student
    ->getPhones()
    ->map(function (Phone $phone){
        return $phone->getNumber();
    })->toArray();


    echo "Id: {$student->getId()}\n";
    echo "Name: {$student->getName()}\n";
    echo "Phones: " . implode(",", $phones) . "\n";

    $courses = $student->getCourses();

    foreach($courses as $course){
        echo "\tID Course: {$course->getId()}\n";
        echo "\tCourse: {$course->getName()}\n";

        echo "\n";
    }
    echo "\n";
}

echo "\n";

foreach($debugStack->queries as $queryInfo){
    echo $queryInfo['sql'] . "\n";
}

// print_r($debugStack);