<div class="jumbotron">
    <h1><strong>Administra&ccedil;&atilde;o</strong></h1>
    <p class="lead">&Aacute;rea de acesso restrito</p>
    <form class="form-signin" action="fnc/logar.php" method="post">
        <label for="login" class="sr-only">E-mail</label>
        <input type="text" name="login" class="form-control" placeholder="Login" value="<?php if(isset($_SESSION['lg'])) echo $_SESSION['lg']; unset($_SESSION['lg']); ?>" required autofocus>
        <label for="senha" class="sr-only">Password</label>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
    </form>
</div>

