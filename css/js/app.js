document
.getElementById("denunciar")
.addEventListener("click", ()=>{

window.location =
"cadastro.php";

});

function mostrarSolucao(){

document.getElementById(
"conteudo"
).innerHTML = `
<h2>Proposta de Valor</h2>

<p>
Através da tecnologia,
os cidadãos de Hidrolândia
podem denunciar locais com
acúmulo de lixo em rios,
riachos e áreas de risco.
</p>
`;

}

function mostrarAjuda(){

document.getElementById(
"conteudo"
).innerHTML = `
<ol>

<li>Clique em Faça sua denúncia</li>

<li>Cadastre-se ou siga anônimo</li>

<li>Escolha o bairro</li>

<li>Descreva o problema</li>

<li>Envie sua denúncia</li>

</ol>
`;

}

function mostrarFuncionamento(){

document.getElementById(
"conteudo"
).innerHTML = `
<p>
A denúncia é registrada no
sistema e fica disponível para
consulta pela prefeitura.
</p>
`;

}

function mostrarColeta(){

document.getElementById(
"conteudo"
).innerHTML = `
<p>
Os horários e rotas da coleta
seletiva serão adicionados
posteriormente.
</p>
`;

}