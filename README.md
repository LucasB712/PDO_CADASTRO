📝 # Sistema de Cadastro de Alunos com PDO

Este é um sistema simples para o cadastro de alunos utilizando PDO (PHP Data Objects) para persistência de dados em um banco de dados SQLite. O projeto inclui funcionalidades básicas como inserção, atualização, remoção e listagem de alunos.

🚀 ## Funcionalidades

Cadastro de Alunos: Adicionar novos alunos ao banco de dados.

Atualização de Alunos: Atualizar informações de alunos existentes.

Remoção de Alunos: Remover alunos do sistema.

Listagem de Alunos: Consultar todos os alunos cadastrados no sistema.

📋 ## Estrutura do Projeto

A estrutura do projeto é dividida em duas partes principais:

## Cadastro de Aluno:

O arquivo student_insert.php realiza a inserção de um novo aluno no banco de dados utilizando PDO.

## Repositório de Alunos:

O repositório PdoStudentRepository é responsável pela comunicação com o banco de dados para as operações de CRUD (Create, Read, Update, Delete) dos alunos.

## Pré-requisitos

PHP versão 7.4 ou superior.

Composer (para gerenciar dependências).

SQLite (para o banco de dados).

🚀 ## Instalação

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/seu_usuario/seu_repositorio.git
```

Navegue até o diretório do projeto:

```bash
cd seu_repositorio
```

Instale as dependências utilizando o Composer:

```bash
composer install
```

## Como Usar
1. Conectando ao Banco de Dados

O banco de dados é criado automaticamente ao rodar o script de inserção de um aluno. A classe ConnectionCreator cria a conexão com o banco SQLite.

2. Inserir um Novo Aluno

No arquivo student_insert.php, um aluno é criado e inserido no banco de dados utilizando o método execute do PDO:

```bash
$aluno = new Student(null, 'Miguel Diaz', new DateTimeImmutable('1997-10-13'));
$sqlInsert = "INSERT INTO alunos (nome, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $aluno->name());
$statement->bindValue(2, $aluno->birthDate()->format('Y-m-d'));
$statement->execute();
```

Ao executar o script, o aluno será inserido na tabela alunos do banco de dados.

3. Usando o Repositório PdoStudentRepository

O repositório PdoStudentRepository oferece métodos para realizar as operações de CRUD, como:

Inserir ou Atualizar Aluno:
O método save verifica se o aluno já existe no banco de dados (com base no ID) e decide se será uma inserção ou uma atualização.

```bash
$repository = new PdoStudentRepository($pdo);
$repository->save($aluno); // Salva o aluno (insere ou atualiza)
```

Remover Aluno:
Para remover um aluno, o método remove pode ser utilizado:

```bash
$repository->remove($aluno);
```

Listar Todos os Alunos:
O método allStudents retorna todos os alunos cadastrados no banco:

```bash
$students = $repository->allStudents();
```

Filtrar Alunos por Data de Nascimento:
Para listar alunos com uma data de nascimento específica, utilize o método studentsBirthAt:

$students = $repository->studentsBirthAt(new DateTimeImmutable('1997-10-13'));

4. Banco de Dados SQLite

O banco de dados SQLite é utilizado para armazenar os alunos. A tabela alunos é criada automaticamente ao rodar o script de inserção de um aluno, com a seguinte estrutura:

```bash
CREATE TABLE alunos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    birth_date DATE NOT NULL
);

```
Exemplo de Execução

Execute o script para inserir um aluno:

```bash
php student_insert.php
```

Se o aluno for inserido com sucesso, você verá a mensagem: Aluno Incluido.

Utilize a classe PdoStudentRepository para gerenciar os alunos diretamente pelo código PHP, inserindo, removendo, ou listando os alunos conforme necessário.

## Contribuindo

Se você quiser contribuir para este projeto, siga os passos abaixo:

Faça um fork do repositório.

Crie uma nova branch para suas alterações:

``` bash
git checkout -b nova-funcionalidade
```

Commit suas alterações:

```bash
git commit -m "Descrição das mudanças"
```

Push suas alterações para o seu fork:
```bash

git push origin nova-funcionalidade
```

Abra um pull request para o repositório original.

## Licença

Este projeto está licenciado sob a MIT License
.
