<?php
session_start();
require_once("dbconfig.php");
require_once("../admin/interface/EntidadeInterface.php");
require_once("../admin/entidades/Usuarios.php");
require_once("../admin/db/ServiceDB.php");
if(($_POST['login'] != '') && ($_POST['senha'] != '')){
    $conn = dbCnct();
    $usuario = new Usuarios();
    $usuario->setFieldId('login')
        ->setValueId($_POST['login']);
    $action = new ServiceDB($conn, $usuario);
    $user = $action->find();
    if(empty($user)){
        $_SESSION['err'] = utf8_encode("Usu�rio n�o identificado. Por favor, verifique.");
        $_SESSION['lg'] = $_POST['login'];
        header('Location: ../login');
    }else{
        if (password_verify($_POST['senha'], $user['senha'])){
            $_SESSION['vld'] = utf8_encode('Bem-vindo � central de administra��o.');
            $_SESSION['LGN'] = TRUE;
            header('Location: ../admin');
        } else {
            $_SESSION['err'] = utf8_encode("Senha incorreta. Por favor, verifique.");
            $_SESSION['lg'] = $_POST['login'];
            header('Location: ../login');
        }
    }
}else if(isset($_POST['sair']) && ($_POST['sair'] == TRUE)) {
    unset($_SESSION['LGN']);
    $_SESSION['vld'] = utf8_encode('A sess�o administrativa foi encerrada.');
    header('Location: ../login');
}else{
    $_SESSION['err'] = utf8_encode('Por favor, informe seus dados de acesso.');
    header('Location: ../login');
}
