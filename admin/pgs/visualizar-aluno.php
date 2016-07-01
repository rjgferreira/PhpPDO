<h1>
    Visualizar aluno
</h1>
<p class="lead">
    Simples apresenta&ccedil;&atilde;o das informa&ccedil;&otilde;es referentes ao aluno.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nota</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <?php
        require_once("db/dbconfig.php");
        require_once("interface/EntidadeInterface.php");
        require_once("entidades/Alunos.php");
        require_once("db/ServiceDB.php");
        $conn = dbCnct();
        $aluno = new Alunos();
        $aluno->setFieldId('id')
            ->setValueId($id);
        $action = new ServiceDB($conn, $aluno);
        $result = $action->find();
        echo '
            <tr>
                <td><input class="form-control" type="text" name="nome" value="'.$result['nome'].'" disabled></td>
                <td><input class="form-control" type="text" name="nota" value="'.$result['nota'].'" disabled></td>
                <td><div class="btn-group pull-right" role="group" aria-label="...">
                      <a class="btn btn-warning" href="'.$http.'/admin/alterar-aluno/'.$result['id'].'">Alterar</a>
                      <a class="btn btn-danger" href="'.$http.'/admin/excluir-aluno/'.$result['id'].'">Excluir</a>
                    </div>
                </td>
            </tr>';
        ?>
    </table>
</form>
