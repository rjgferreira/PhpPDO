<h1>
    Cadastro de Usu&aacute;rio
</h1>
<p class="lead">
    Registrar um novo usu&aacute;rio do sistema.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>Login</th>
                <th>Senha</th>
                <th colspan="2">&nbsp;</th>
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
        $action = new ServiceDB($conn, $usuario);
        if(isset($_POST['login']) && isset($_POST['senha'])) {
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);
            $action->addToInsert('login',$usuario->getLogin())
                ->addToInsert('senha',$usuario->getSenha());
            $result = $action->inserir();
            if ($result == 1) {
                echo "<tr class='success'><td colspan='4'>Usu&aacute;rio registrado com sucesso!</td></tr>";
            }else{
                echo "<tr class='success'><td colspan='4'>Ocorreu uma falha na requisi&ccedil;&atilde;o. Por favor, tente novamente.</td></tr>";
            }
        }
        ?>
            <tr>
                <td>
                    <input class='form-control' type='text' name='login' placeholder="Login" required>
                </td>
                <td>
                    <input class='form-control' type='password' name='senha' placeholder="Senha" required>
                </td>
                <td align='center'>
                    <button type='submit' class='btn btn-primary'>Cadastrar</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
