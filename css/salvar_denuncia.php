<?php

session_start();

include("conexao.php");

$bairro = $_POST['bairro'];
$descricao = $_POST['descricao'];

$sql = "
INSERT INTO denuncias
(bairro, descricao)
VALUES
('$bairro','$descricao')
";

$conexao->query($sql);

header("Location: sucesso.php");

?>