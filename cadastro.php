<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cadastro - TecHidro</title>

<link rel="stylesheet" href="css/cadastro.css">

</head>

<body>
    <div class="ajuda">

    ?

    <div class="ajuda-texto">

        <strong>Como criar sua conta?</strong>

        <br><br>

        Digite um email válido e crie uma senha.

        <br><br>

        Depois clique em
        <b>Criar</b>.

        <br><br>

        Já possui uma conta?

        Clique em
        <b>Entrar</b>
        para acessar a tela de login.

    </div>

</div>

<a href="index.php" class="voltar">
    Voltar
</a>

<h1 class="titulo">
    Faça o seu cadastro!
</h1>

<div class="container">

    <div class="card-esquerdo">

        <img src="bolhas2.png"
     class="bolhas"
     alt="Bolhas">

        <h2>
            Já possui uma conta?
        </h2>

        <a href="login.php">

            <button class="btn-entrar">

                Entrar

            </button>

        </a>

    </div>

    <div class="card-direito">

        <img src="avatar2.png"
             class="avatar"
             alt="Avatar">

        <h2>
            Crie sua conta
        </h2>

        <form action="salvar_usuario.php"
              method="POST">

            <input
                type="email"
                name="email"
                placeholder="Crie o seu email"
                required
            >

            <input
                type="password"
                name="senha"
                placeholder="Crie sua senha"
                required
            >

            <a href="anonimo.php"
   class="anonimo">

   Prefiro continuar de forma anônima

</a>

            <button
                type="submit"
                class="btn-criar">

                Criar

            </button>

        </form>

    </div>
    <img src="ondas2.png"
             class="onda"
             alt="Onda">
</div>

</body>
</html>