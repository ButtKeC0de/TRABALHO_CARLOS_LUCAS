<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="cadastro">
                  <form method="POST" action="cadastro.php">

        <div class="login">
            <h2>Cadastro de Usuário </h2>
                <label>Nome: </label>
                <input type="text" name="nome" id="nome">
                <br>
                <label>E-mail: </label>
                <input type="text" name="email" id="email">

           
        
        </div>

        <div class="login">
            <h2>Cadastro de Pratos</h2>
            <form method="POST" action="cadastro.php">
                <label>Nome: </label>
                <input type="text" name="nome_prato" id="nome_prato">
                <br>
                <label>Preço: </label>
                <input type="text" name="preco" id="preco">
                <br>
                <label>Categoria: </label>
                <input type="text" name="categoria" id="categoria">
                <br>
                <label>Descrição: </label>
                <input type="text" name="descricao" id="descricao">


          

        </div>
          <button id="submit" type="submit">ENTRAR</button>
            </form>
    </div>




    <div id="cadastro_2">



    </div>

</body>

</html>


<?php
require_once "infra/db/connect.php";

mysqli_select_db($connect, "Sistema_Cadastro_de_Pratos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['nome']) && !empty($_POST['email'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "INSERT INTO usuario (nome, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $nome, $email);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Usuário cadastrado com sucesso!<br>";
            } else {
                echo "Erro ao cadastrar usuário.<br>";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if (!empty($_POST['nome_prato']) && !empty($_POST['preco']) && !empty($_POST['categoria']) && !empty($_POST['descricao'])) {
        $nome_prato = $_POST['nome_prato'];
        $preco      = $_POST['preco'];
        $categoria  = $_POST['categoria'];
        $descricao  = $_POST['descricao'];

        $sql = "INSERT INTO prato (nome_prato, preco, categoria, descricao) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sdss", $nome_prato, $preco, $categoria, $descricao);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Prato cadastrado com sucesso!<br>";
            } else {
                echo "Erro ao cadastrar prato.<br>";
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>