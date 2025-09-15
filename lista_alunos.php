<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$caminhoBanco = './banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

$result = $pdo->query('SELECT * FROM alunos');
//var_dump($result->fetchAll(PDO::FETCH_ASSOC)); exit();

$studentDataList = $result->fetchAll(PDO::FETCH_ASSOC);  
$studentList = [];

/* DESSE JEITO ECONOMIZA MEMÓRIA
while($studentData = $statement->fetch(PDO:: FETCH_ASSOC)){
     $studentList[] =  new Student(
        $studentData['id'],$studentData['nome'], new DateTimeImmutable($studentData['birth_date']) 
    );
    echo $student->age() . PHP_EOL;
}
*/
foreach ($studentDataList as $studentData) {
    $studentList[] =  new Student(
        $studentData['id'],$studentData['nome'], new DateTimeImmutable($studentData['birth_date']) 
    );
}
//5:26
var_dump(($studentList));