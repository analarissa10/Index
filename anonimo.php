<?php

session_start();

$_SESSION['origem'] = "cadastro";

header("Location: denuncia.php");
exit;

?>