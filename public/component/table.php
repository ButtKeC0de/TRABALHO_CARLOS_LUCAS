<hr>

<h4>Pratos Cadastrados</h4>

<table>

    <tr>

        <th>Prato</th>
        <th>Usuario</th>

    </tr>

    <?php

require_once __DIR__ . '/../../infra/db/connect.php';


$sqlUsuario = "SELECT * FROM usuario";
$resultadoUsuario = $conn->query($sqlUsuario);
?>

<hr>
<h4>Pratos Cadastrados</h4>

<table>
    <thead>
        <tr>
            <th>Prato</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($linha = $resultadoUsuario->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($linha['Prato']) ?></td>
                <td><?= htmlspecialchars($linha['usuario']) ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('Deseja realmente excluir o prato?');">
                        <input type="hidden" name="idPrato" value="<?= $linha['idPrato'] ?>">
                        <input type="submit" value="Excluir">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>