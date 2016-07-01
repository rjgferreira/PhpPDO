<h1>
    Alterar aluno
</h1>
<p class="lead">
    Corrija nome e nota referentes ao aluno.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nota</th>
                <th colspan="2">&nbsp;</th>
            <tr>
        </thead>
        <tbody>
        <?php
        require_once("db/dbconfig.php");
        require_once("interface/EntidadeInterface.php");
        require_once("entidades/Alunos.php");
        require_once("db/ServiceDB.php");
        $conn = dbCnct();
        // Antes de instanciar ServiceDB é necessário configurar o Aluno
        $aluno = new Alunos();
        $aluno->setFieldId('id')
            ->setValueId($id);
        $action = new ServiceDB($conn, $aluno);
        if(isset($_POST['nome']) && isset($_POST['nota'])) {
            $action->addToUpdate('id',$id)
                    ->addToUpdate('nome', $_POST['nome'])
                    ->addToUpdate('nota', $_POST['nota']);
            $result = $action->alterar();
            if($result) {
                echo "<tr class='success'><td colspan='4'>O registro foi alterado com sucesso!</td></tr>";
            }else{
                echo "<tr class='warning'><td colspan='4'><span class='label label-warning'>Ocorreu uma falha na requisi&ccedil;&atilde;o. Por favor, tente novamente.</span></td></tr>";
            }
        }
       $result = $action->find();
        echo "
          <tr>
             <td><input class='form-control' type='text' name='nome' value='".$result['nome']."'></td>
             <td><input class='form-control' type='text' name='nota' value='".$result['nota']."'></td>
             <td><input class='form-control' type='hidden' name='id' value='".$result['id']."'></td>
             <td align='center'><button type='submit' class='btn btn-warning'>Alterar</button></td>
          </tr>";

        ?>
        </tbody>
    </table>
</form>


