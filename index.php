<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="cadastro">
        <div class="login">
            <h2>Cadastro de Usuário </h2>
            <form method="POST" action="cadastro.php">
                <label>Nome: </label>
                <input type="text" name="nome" id="nome">
                <br>
                <label>E-mail: </label>
                <input type="text" name="email" id="email">
            </form>

            <button id="submit" type="submit">ENTRAR</button>
        </div>

        <div class="login">
            <h2>Cadastro de Pratos</h2>
            <form method="POST" action="cadastro.php">
                <label>Nome: </label>
                <input type="text" name="nome_prato id="nome_prato">
                <br>
                <label>Preço: </label>
                <input type="text" name="preco" id="preco">
                <br>
                <label>Categoria: </label>
                <input type="text" name="categoria" id="categoria">
                <br>
                <label>Descrição: </label>
                <input type="text" name="descricao" id="descricao">


            </form>

            <button id="submit" type="submit">ENTRAR</button>

        </div>
    </div>




    <div id="cadastro_2">



    </div>

</body>

</html>


<?php

$nome = $_POST['login'];
$email = $_POST['email'];
$nome_prato = $_POST['nome_prato'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

$conn = new mysqli('localhost', 'root', '', 'cadastro');
