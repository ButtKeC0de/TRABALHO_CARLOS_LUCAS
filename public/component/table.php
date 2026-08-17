<hr>

<h4>Pratos Cadastrados</h4>

<table>

    <tr>

        <th>Prato</th>
        <th>Usuario</th>

    </tr>

<?php

    $sqlUsuario = "select * FROM usuario";

    $resultadoUsuario = $conn->query($sqlUsuario);

    while ($resultadoUsuario = $resultadoUsuario->fetch_assoc()) {

        echo" <tr>
        
        <td>".$linha['Prato']."</td>
        <td>".$linha['usuario']."</td>
        
        <td>
        <form method = \"POST\" onsubit=\"return confirm('Deseja realmente excluir o prato?');\">
        <input type = \"hidden\" name = \"idPrato\" value = \"".$linha['idPrato']."\">
        <in  put type = \"submit\" value = \"Excluir\">
            </form>
            </td>
            </tr>  
            
    
            ?>

            }
            
            </table>

