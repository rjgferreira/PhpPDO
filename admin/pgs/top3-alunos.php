<h1>
    Top 3 alunos
</h1>
<p class="lead">
    Lista dos 3 primeiros alunos da classe.
</p>
<table class="table">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th>Nome</th>
            <th>Nota</th>
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
    $res = $action->alunosTop3();
        foreach($res as $alunos) {
            echo "<tr>
                    <td>" . $alunos['id'] . "</td>
                    <td>" . "" . $alunos['nome'] . "</td>
                    <td>" . $alunos['nota'] . "</td>
                 </tr>";
        }
    ?>
    </tbody>
</table>
