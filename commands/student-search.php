<?php

use Project\Doctrine\Entity\Student;
use Project\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**
 * @var Aluno[] $alunoList
 */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student){
    echo "ID: {$student->getId()}\nName: {$student->getName()}\n\n";
}

$GabrielaRocha = $studentRepository->find(4);
echo $GabrielaRocha->getName() . PHP_EOL;

// $PaulaGarcia = $studentRepository->findBy(['name' => 'Paula Garcia']);
// var_dump($PaulaGarcia);

// $GabrielOPensador = $studentRepository->findOneBy(['name' => 'Gabriel O Pensador']);
// var_dump($GabrielOPensador);
