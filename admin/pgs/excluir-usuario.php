<h1>
    Excluir usu&aacute;rio
</h1>
<p class="lead">
    Visualiza&ccedil;&atilde;o das informa&ccedil;&otilde;es para confer&ecirc;ncia antes da exclus&atilde;o.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once("db/dbconfig.php");
        require_once("interface/EntidadeInterface.php");
        require_once("entidades/Usuarios.php");
        require_once("db/ServiceDB.php");
        $conn = dbCnct();
        $usuario = new Usuarios();
        $usuario->setFieldId('id')
            ->setValueId($id);
        $action = new ServiceDB($conn, $usuario);
        if(isset($_POST['excluir'])) {
            if($action->excluir()){
                echo "<tr class='success'><td colspan='4'>O registro foi excluido em definitivo!</td></tr>";
            }else{
                echo "<tr class='warning'><td colspan='4'>Ocorreu uma falha na requisi&ccedil;&atilde;o. Por favor, tente novamente.</td></tr>";
            }
        }else{
            $result = $action->find();
            echo '
            <tr>
                <td><input class="form-control" type="text" name="id" value="'.$result['id'].'" disabled></td>
                <td><input class="form-control" type="text" name="login" value="'.$result['login'].'" disabled></td>
                <td><input class="btn btn-danger" type="submit" name="excluir" value="Excluir"></td>
            </tr>';
        }
        ?>
        </tbody>
    </table>
</form>
