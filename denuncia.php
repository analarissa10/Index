<?php

session_start();

include("conexao.php");

$paginaVoltar = "login.php";

if(
    isset($_SESSION['origem']) &&
    $_SESSION['origem'] == "cadastro"
){
    $paginaVoltar = "cadastro.php";
}

if(isset($_POST['confirmar'])){

    $bairro = $_POST['bairro'];
    $descricao = $_POST['descricao'];

    $usuario =
    isset($_SESSION['id'])
    ? $_SESSION['id']
    : NULL;

    $anonima =
    $usuario ? 0 : 1;

    $stmt = $conexao->prepare(
        "INSERT INTO denuncias
        (usuario_id, anonima, bairro_id, descricao)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "iiss",
        $usuario,
        $anonima,
        $bairro,
        $descricao
    );

    $stmt->execute();

    header("Location: sucesso.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Denúncia - TecHidro</title>

<link rel="stylesheet"
href="css/denuncia.css">

</head>

<body>
    <div class="ajuda">

    ?

    <div class="ajuda-texto">

        <strong>Como denunciar?</strong>

        <br><br>

        Escolha o bairro onde existe
        acúmulo de lixo em áreas aquáticas.

        <br><br>

        Se desejar, escreva uma descrição
        explicando melhor o problema.

        <br><br>

        Quando terminar clique em
        <b>Próximo</b>.

        <br><br>

        Caso queira retornar à tela anterior,
        clique em
        <b>Voltar</b>.

    </div>

</div>

<!-- ROBÔ -->

<img
src="robo1.png"
class="robo"
alt="Robô">

<!-- CONTEÚDO -->

<div class="container">

    <!-- BOLHAS -->

    <img
    src="bolhinhas.png"
    class="bolhas"
    alt="Bolhas">

    <h1>
        Hora de fazer sua denúncia!
    </h1>

    <!-- CARD -->

    <div class="card">

        <form method="POST">

            <h2>
                Indique o bairro atingido:
            </h2>

            <select
            name="bairro"
            required>

                <option
                value=""
                selected
                disabled>

                    Bairros de Hidrolândia-CE

                </option>

                <?php

                $resultado =
                $conexao->query(
                "SELECT * FROM bairros
                ORDER BY nome ASC");

                while(
                $bairro =
                $resultado->fetch_assoc()
                ){

                ?>

                <option
                value="<?php
                echo $bairro['id'];
                ?>">

                    <?php
                    echo $bairro['nome'];
                    ?>

                </option>

                <?php } ?>

            </select>

        <textarea name="descricao" placeholder="Informações adicionais (opcional)"></textarea>

            <div class="botoes">

                <a
                href="<?php echo $paginaVoltar; ?>">

                    <button
                    type="button"
                    class="voltar">

                        Voltar

                    </button>

                </a>

                <button

                type="submit"

                name="confirmar"

                class="proximo">

                    Próximo

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>