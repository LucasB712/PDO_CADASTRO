<?php

//Pede caminho absoluto
$caminhoBanco = './banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

echo 'Conectei';

$createTableSql = '
    CREATE TABLE IF NOT EXISTS alunos (
        id INTEGER PRIMARY KEY,
        nome TEXT,
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES alunos(id)
    );
';

$pdo->exec($createTableSql);