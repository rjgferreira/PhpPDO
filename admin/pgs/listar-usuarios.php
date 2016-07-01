<h1>
    Listagem de Usuarios
</h1>
<p class="lead">
    Lista completa dos usu&aacute;rios do sistema. Altere ou exclua registros.
</p>
<table class="table">
    <thead>
        <tr>
            <th width="5%">ID</th>
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
    $action = new ServiceDB($conn, $usuario);
    $res = $action->listar();
    foreach($res as $usuarios){
        echo '<tr>
                <td>'.$usuarios['id'].'</td>
                <td>'.$usuarios['login'].'</td>
                <td>
                    <div class="btn-group" role="group" aria-label="...">
                      <a class="btn btn-warning" href="'.$http.'/admin/alterar-usuario/'.$usuarios['id'].'">Alterar</a>
                      <a class="btn btn-danger" href="'.$http.'/admin/excluir-usuario/'.$usuarios['id'].'">Excluir</a>
                    </div>
                </td>
             </tr>';
    }
    ?>
    </tbody>
</table>
