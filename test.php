<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

$pdo = new PDO('...');
$repository = new PdoStudentRepository($pdo);

