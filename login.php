<?php

session_start();

include("conexao.php");

if(isset($_POST['entrar'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare(
        "SELECT * FROM usuarios
        WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){

        $usuario =
        $resultado->fetch_assoc();

        if(
            password_verify(
                $senha,
                $usuario['senha']
            )
        ){

            $_SESSION['id'] =
            $usuario['id'];

            $_SESSION['origem'] = "login";

            header(
                "Location: denuncia.php"
            );

            exit;
        }
    }

    $erro =
    "Email ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login - TecHidro</title>

<link rel="stylesheet"
href="css/login.css">

</head>

<body>
    <div class="ajuda">

    ?

    <div class="ajuda-texto">

        <strong>Como entrar?</strong>

        <br><br>

        Informe o email e a senha que você
        cadastrou anteriormente.

        <br><br>

        Em seguida clique em
        <b>Entrar</b>
        para acessar sua conta.

    </div>

</div>

<img
src="bolhas2.png"
class="bolhas"
alt="Bolhas">

<img
src="ondas2.png"
class="onda"
alt="Onda">

<div class="login-page">

    <a href="cadastro.php" class="voltar">
        Voltar
    </a>

    <h1 class="titulo">
        Olá novamente!
    </h1>

    <div class="container-login">

        <div class="social-box">

            <h2>
                Entre usando um desses!
            </h2>

            <div class="social-icons">

                <div class="icone-social">
                    <img src="instagram.png"
                    alt="Instagram">
                </div>

                <div class="icone-social">
                    <img src="facebook.png"
                    alt="Facebook">
                </div>

                <div class="icone-social">
                    <img src="google.png"
                    alt="Google">
                </div>

            </div>

        </div>

        <div class="form-box">

            <div class="usuario">
                <img src="avatar2.png"
                alt="Usuário">
            </div>

            <h2>
                Faça o seu login
            </h2>

            <?php
            if(isset($erro)){
                echo "<p class='erro'>$erro</p>";
            }
            ?>

            <form method="POST">

                <input
                type="email"
                name="email"
                placeholder="Digite seu email"
                required>

                <input
                type="password"
                name="senha"
                placeholder="Digite sua senha"
                required>

                <button
                type="submit"
                name="entrar">

                    Entrar

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>