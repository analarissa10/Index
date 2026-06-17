<?php

session_start();

include("conexao.php");

$email = $_POST['email'];

$senha = password_hash(
    $_POST['senha'],
    PASSWORD_DEFAULT
);

/* VERIFICA SE O EMAIL JÁ EXISTE */

$verifica = $conexao->prepare(
    "SELECT id
    FROM usuarios
    WHERE email = ?"
);

$verifica->bind_param(
    "s",
    $email
);

$verifica->execute();

$resultado =
$verifica->get_result();

if($resultado->num_rows > 0){

    echo "
    <script>

    alert('Este email já está cadastrado!');

    window.location.href='cadastro.php';

    </script>
    ";

    exit;
}

/* CADASTRA O USUÁRIO */

$stmt = $conexao->prepare(
    "INSERT INTO usuarios
    (email, senha)
    VALUES (?, ?)"
);

$stmt->bind_param(
    "ss",
    $email,
    $senha
);

if($stmt->execute()){

    $_SESSION['origem'] = "cadastro";

    header("Location: denuncia.php");
    exit;

}else{

    echo "
    <script>

    alert('Erro ao cadastrar usuário.');

    window.location.href='cadastro.php';

    </script>
    ";
}

?>