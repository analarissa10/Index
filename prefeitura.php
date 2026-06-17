<?php

include("conexao.php");

$resultado =
$conn->query(
"SELECT * FROM denuncias
ORDER BY data_denuncia DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Painel Prefeitura</title>

<link rel="stylesheet"
href="css/style.css">

</head>
<body>

<div class="container">

<h1>
Denúncias Recebidas
</h1>

<table>

<tr>

<th>ID</th>
<th>Bairro</th>
<th>Descrição</th>
<th>Data</th>
<th>Status</th>

</tr>

<?php

while(
$denuncia =
$resultado->fetch_assoc()
){

echo "

<tr>

<td>{$denuncia['id']}</td>

<td>{$denuncia['bairro']}</td>

<td>{$denuncia['descricao']}</td>

<td>{$denuncia['data_denuncia']}</td>

<td>{$denuncia['status']}</td>

</tr>

";

}

?>

</table>

</div>

</body>
</html>