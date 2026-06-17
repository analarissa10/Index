<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "techidro";

$conexao = new mysqli(
    $host,
    $usuario,
    $senha,
    $banco
);

if($conexao->connect_error){
    die("Erro: " . $conexao->connect_error);
}
?>