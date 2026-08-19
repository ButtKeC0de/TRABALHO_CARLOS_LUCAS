<?php
require_once __DIR__ . '/../../infra/db/connect.php';

$mensagem = "";
$prato = null;


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idPrato = $_GET['id'];

    $sql = "SELECT * FROM prato WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idPrato);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $prato = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPrato    = $_POST['idPrato'];
    $nome_prato = $_POST['nome_prato'];
    $preco      = $_POST['preco'];
    $categoria  = $_POST['categoria'];
    $descricao  = $_POST['descricao'];

    $sqlUpdate = "UPDATE prato SET nome_prato = ?, preco = ?, categoria = ?, descricao = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqlUpdate);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sdssi", $nome_prato, $preco, $categoria, $descricao, $idPrato);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) >= 0) {
            $mensagem = "Prato atualizado com sucesso!";

            $prato['nome_prato'] = $nome_prato;
            $prato['preco']      = $preco;
            $prato['categoria']  = $categoria;
            $prato['descricao']  = $descricao;
        } else {
            $mensagem = "Erro ao atualizar o prato.";
        }
        mysqli_stmt_close($stmt);
    }
}


if (!$prato && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Prato não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Prato</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

    <h2>Editar Prato</h2>

    <?php if (!empty($mensagem)): ?>
        <p style="color: green; font-weight: bold;"><?= $mensagem ?></p>
        <a href="index.php">Voltar para a lista</a>
        <br><br>
    <?php endif; ?>

    <form method="POST" action="editar_prato.php?id=<?= $prato['id'] ?>">
    
        <input type="hidden" name="idPrato" value="<?= $prato['id'] ?>">

        <label>Nome do Prato: </label><br>
        <input type="text" name="nome_prato" value="<?= htmlspecialchars($prato['nome_prato']) ?>" required>
        <br><br>

        <label>Preço: </label><br>
        <input type="text" name="preco" value="<?= htmlspecialchars($prato['preco']) ?>" required>
        <br><br>

        <label>Categoria: </label><br>
        <input type="text" name="categoria" value="<?= htmlspecialchars($prato['categoria']) ?>" required>
        <br><br>

        <label>Descrição: </label><br>
        <input type="text" name="descricao" value="<?= htmlspecialchars($prato['descricao']) ?>" required>
        <br><br>

        <button type="submit">Salvar Alterações</button>
          <a href="table.php?">Voltar para a lista</a>
    </form>

</body>
</html>''