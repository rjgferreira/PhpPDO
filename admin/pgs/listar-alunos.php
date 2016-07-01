<h1>
    Listagem de alunos
</h1>
<p class="lead">
    Lista completa dos alunos e suas respectivas notas. Altere ou exclua registros.
</p>
<table class="table">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th>Nome</th>
            <th>Nota</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php
    require_once("db/dbconfig.php");
    require_once("interface/EntidadeInterface.php");
    require_once("entidades/Alunos.php");
    require_once("db/ServiceDB.php");
    $conn = dbCnct();
    $aluno = new Alunos();
    if(isset($_POST['busca'])){
        $aluno->setFieldId('nome')
            ->setValueId(trim($_POST['busca']));
    }
    $action = new ServiceDB($conn, $aluno);
    if(isset($_POST['busca'])){
        $res = $action->search();
    }else{
        $res = $action->listar();
    }
    foreach($res as $alunos){
        echo '<tr>
            <td>'.$alunos['id'].'</td>
            <td>'.$alunos['nome'].'</td>
            <td>'.$alunos['nota'].'</td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                  <a class="btn btn-warning" href="'.$http.'/admin/alterar-aluno/'.$alunos['id'].'">Alterar</a>
                  <a class="btn btn-info" href="'.$http.'/admin/visualizar-aluno/'.$alunos['id'].'">Visualizar</a>
                  <a class="btn btn-danger" href="'.$http.'/admin/excluir-aluno/'.$alunos['id'].'">Excluir</a>
                </div>
            </td>
         </tr>';
    }
?>
    </tbody>
</table>
