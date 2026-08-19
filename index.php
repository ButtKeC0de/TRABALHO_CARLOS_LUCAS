<?php
require_once "infra/db/connect.php";

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nome       = trim($_POST['nome'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $nome_prato = trim($_POST['nome_prato'] ?? '');
    $preco      = trim($_POST['preco'] ?? '');
    $categoria  = trim($_POST['categoria'] ?? '');
    $descricao  = trim($_POST['descricao'] ?? '');

   
    if (!empty($nome) && !empty($email) && !empty($nome_prato)) {
        
 
        $sql = "INSERT INTO usuario (nome, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $nome, $email);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
            
                $usuario_id = mysqli_insert_id($conn);

      
                $sqlPrato = "INSERT INTO prato (nome_prato, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)";
                $stmtPrato = mysqli_prepare($conn, $sqlPrato);

                if ($stmtPrato) {

                    mysqli_stmt_bind_param(
                        $stmtPrato,
                        "ssdsi",
                        $nome_prato,
                        $descricao,
                        $preco,
                        $categoria,
                        $usuario_id
                    );
                    
                    mysqli_stmt_execute($stmtPrato);
                    mysqli_stmt_close($stmtPrato);
                }
            }
            mysqli_stmt_close($stmt);
        }


        header("Location: index.php");
        exit;
    } else {
        $mensagem = "Por favor, preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>

    <?php if (!empty($mensagem)): ?>
        <p style="color: red; font-weight: bold; text-align: center;"><?= $mensagem ?></p>
    <?php endif; ?>

    <div id="cadastro">

        <form method="POST" action="index.php">
            <div class="login">
                <h2>Cadastro de Usuário</h2>
                <label>Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br>
                <label>E-mail:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="login">
                <h2>Cadastro de Pratos</h2>
                <label>Nome:</label>
                <input type="text" name="nome_prato" id="nome_prato" required>
                <br>
                <label>Preço:</label>
                <input type="number" step="0.01" name="preco" id="preco" required>
                <br>
                <label>Categoria:</label>
                <input type="text" name="categoria" id="categoria" required>
                <br>
                <label>Descrição:</label>
                <input type="text" name="descricao" id="descricao" required>
            </div>

            <button id="submit" type="submit">
                ENTRAR
            </button>

        </form>

    </div>

    <div id="cadastro_2">
        <?php include __DIR__ . "/public/component/table.php"; ?>
    </div>

</body>

</html>