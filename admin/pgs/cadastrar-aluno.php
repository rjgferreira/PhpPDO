<h1>
    Cadastro de alunos
</h1>
<p class="lead">
    Registrar um novo aluno no sistema.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nota</th>
                <th colspan="2">&nbsp;</th>
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
        $action = new ServiceDB($conn, $aluno);
        if(isset($_POST['nome']) && isset($_POST['nota'])) {
            $action->addToInsert('nome',$_POST['nome'])
                ->addToInsert('nota',$_POST['nota']);
            $result = $action->inserir();
            if ($result == 1) {
                echo "<tr class='success'><td colspan='4'>O aluno foi registrado com sucesso!</td></tr>";
            }else{
                echo "<tr class='success'><td colspan='4'>Ocorreu uma falha na requisição. Por favor, tente novamente.</td></tr>";
            }
        }
        ?>
            <tr>
                <td>
                    <input class='form-control' type='text' name='nome' placeholder="Nome" required>
                </td>
                <td>
                    <input class='form-control' type='number' name='nota' placeholder="Nota" required>
                </td>
                <td align='center'>
                    <button type='submit' class='btn btn-primary'>Cadastrar</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
