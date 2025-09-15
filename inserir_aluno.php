<?php

use Alura\Pdo\Domain\Model\Student;


require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$aluno = new Student(null, 'Miguel Diaz', new DateTimeImmutable('1997-10-13'));
//$sqlInsert = "INSERT INTO alunos (nome, birth_date) VALUES
//('{$aluno->name()}', '{$aluno->birthDate()->format('Y-m-d')}' )";

$sqlInsert = "INSERT INTO alunos (nome, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare(($sqlInsert));

$statement->bindValue(1, $aluno->name());
$statement->bindValue(2, $aluno->birthDate()->format('Y-m-d'));

//$statement->bindParam(1, $name);
if ($statement->execute()) {
    echo "Aluno Incluido";
};

//bind param passa uma referencia/endereço
//bind value já passa o valor direto

/*
echo $sqlInsert; exit();

$pdo->exec($sqlInsert);
var_dump($pdo->exec($sqlInsert));*/