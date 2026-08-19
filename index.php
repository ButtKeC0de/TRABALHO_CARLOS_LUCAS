
<?php

require_once "infra/db/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuario (nome, email)
            VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nome, $email);
    mysqli_stmt_execute($stmt);


    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Usuário cadastrado com sucesso!<br>";
        $usuario_id = mysqli_insert_id($conn);
        $nome_prato = $_POST['nome_prato'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $sql = "INSERT INTO prato
                (nome_prato, descricao, preco, categoria, usuario_id)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "ssdsi",
            $nome_prato,
            $descricao,
            $preco,
            $categoria,
            $usuario_id
        );


        mysqli_stmt_execute($stmt);


        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Prato cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar prato.";
        }
    } else {
        echo "Erro ao cadastrar usuário.";

    }

}

?>