<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require_once"dbconfig.php";
$conn = dbCnct();
echo "********** Fixture<br>";
echo "********** Criando a base de dados (se não existir)";

$conn->query("CREATE DATABASE IF NOT EXISTS pdo DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_unicode_ci'");

echo "********** Removendo tabela 'usuarios' (se existir)<br>";
$conn->query("DROP TABLE IF EXISTS usuarios");

echo "********** Criando tabela 'usuarios'<br>";
$conn->query("CREATE TABLE IF NOT EXISTS usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	login VARCHAR(30) NOT NULL,
	senha VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
	PRIMARY KEY (id),
	UNIQUE(login));");

echo "********** Feito!<br>";

echo "********** Criando usuário padrão...<br>";

$usuario = 'admin';
$options = [
    'salt' => md5('384jksdo%783*'),
    'cost' => 10
];
$senha = password_hash('admin', PASSWORD_DEFAULT, $options);
$smt = $conn->prepare("INSERT INTO usuarios (
                            login,
                            senha)
                        VALUE (
                            :login,
                            :senha);");
$smt->execute(array(
    ':login' => $usuario,
    ':senha' => $senha
));

echo "********** Criando a tabela alunos (se não existir).";

$conn->query("CREATE TABLE IF NOT EXISTS alunos(
                    id INT NOT NULL AUTO_INCREMENT,
                    nome VARCHAR(255),
                    nota INT,
                PRIMARY KEY (id)");

echo "********** Inserindo informações de alunos.";

$conn->query("INSERT INTO alunos
(nome, nota)
VALUES
('Clarisse', ROUND(RAND() * (10 - 0))),
  ('Alberto', ROUND(RAND() * (10 - 0))),
  ('Roberto', ROUND(RAND() * (10 - 0))),
  ('Fabiane', ROUND(RAND() * (10 - 0))),
  ('Mariana', ROUND(RAND() * (10 - 0))),
  ('Lucas', ROUND(RAND() * (10 - 0))),
  ('Marcos', ROUND(RAND() * (10 - 0))),
  ('Júlia', ROUND(RAND() * (10 - 0))),
  ('Cristiane', ROUND(RAND() * (10 - 0))),
  ('Carina', ROUND(RAND() * (10 - 0))),
  ('Débora', ROUND(RAND() * (10 - 0))),
  ('Rodrigo', ROUND(RAND() * (10 - 0))),
  ('Andréia', ROUND(RAND() * (10 - 0)))");
echo "********** Concluído.";

?>
</body>
</html>
