<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$caminhoBanco = './banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);


$preparedstatement = $pdo->prepare('DELETE FROM alunos WHERE id = ?;');
//INFORMAR PARÂMETRO
$preparedstatement->bindValue(1, 3, PDO::PARAM_INT);
var_dump($preparedstatement->execute());
