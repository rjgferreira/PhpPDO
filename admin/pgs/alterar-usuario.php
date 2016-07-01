<h1>
    Alterar usu&aacute;rio
</h1>
<p class="lead">
    Modifique login e senha de acesso.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>Login</th>
                <th>Senha</th>
                <th colspan="2">&nbsp;</th>
            <tr>
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
        if(isset($_POST['login']) && isset($_POST['senha'])) {
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);
            $action->addToUpdate('id',$id)
                ->addToUpdate('login', $usuario->getLogin())
                ->addToUpdate('senha', $usuario->getSenha());
            $result = $action->alterar();
            if($result) {
                echo "<tr class='success'><td colspan='4'>O registro foi alterado com sucesso!</td></tr>";
            }else{
                echo "<tr class='warning'><td colspan='4'>Ocorreu uma falha na requisi&ccedil;&atilde;o. Por favor, tente novamente.</td></tr>";
            }
        }
       $result = $action->find();
        echo "
          <tr>
             <td><input class='form-control' type='text' name='login' value='".$result['login']."' required></td>
             <td><input class='form-control' type='password' name='senha' required></td>
             <td><input class='form-control' type='hidden' name='id' value='".$result['id']."'></td>
             <td align='center'><button type='submit' class='btn btn-warning'>Alterar</button></td>
          </tr>";

        ?>
        </tbody>
    </table>
</form>


