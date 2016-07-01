<?php
	session_start();
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$http = "http://".$_SERVER['HTTP_HOST'];
	$itens = explode('/',urldecode(substr($rota['path'], 1)));
	// Se $path possuir mais que dois itens (pasta:item0/arquivo:item1), então existe parâmetro (param:item2)
	if(count($itens)>2){
		// O último elemento sempre será o parâmetro ID
		$id = array_pop($itens);
		// Reconstruindo o path sem parâmetro (pasta:item0/arquivo:item1)
		$path = implode("/",$itens);
	}else{
		$path = urldecode(substr($rota['path'], 1));
	}
	if(!isset($_SESSION['LGN'])){
		$_SESSION['err'] = "Por favor, inicie uma se&ccedil;&atilde;o administrativa. ";
		header('Location: ../login');
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administra&ccedil;&atilde;o</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=$http?>/css/css.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Administra&ccedil;&atilde;o</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						Alunos
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li <?php if($path=='admin/listar-alunos' || $path == 'admin' || $path == '') echo 'class="active"' ?>><a href="<?=$http?>/admin/listar-alunos">Listar</a></li>
						<li <?php if($path=='admin/cadastrar-aluno') echo 'class="active"' ?>><a href="<?=$http?>/admin/cadastrar-aluno">Cadastrar</a></li>
						<li <?php if($path=='admin/top3-alunos') echo 'class="active"' ?>><a href="<?=$http?>/admin/top3-alunos">Top 3</a></li>
						<?php if($path=='admin/visualizar-aluno') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Visualizar</a></li>' ?>
						<?php if($path=='admin/alterar-aluno') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Alterar</a></li>' ?>
						<?php if($path=='admin/excluir-aluno') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Excluir</a></li>' ?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						Usu&aacute;rios
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li <?php if($path=='admin/listar-usuarios' || $path == '') echo 'class="active"' ?>><a href="<?=$http?>/admin/listar-usuarios">Listar</a></li>
						<li <?php if($path=='admin/cadastrar-usuario') echo 'class="active"' ?>><a href="<?=$http?>/admin/cadastrar-usuario">Cadastrar</a></li>
						<?php if($path=='admin/visualizar-usuario') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Visualizar</a></li>' ?>
						<?php if($path=='admin/alterar-usuario') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Alterar</a></li>' ?>
						<?php if($path=='admin/excluir-usuario') echo '<li role="separator" class="divider"></li><li class="active"><a href="#">Excluir</a></li>' ?>
					</ul>
				</li>
			</ul>
			<form action="<?=$http?>/fnc/logar.php" method="post" class="navbar-form navbar-right" style="margin-top:8px;">
				<button type="submit" class="btn btn-warning" >Sair?</button>
				<input type="hidden" name="sair" value="TRUE">
			</form>
			<?php if($path=='admin/listar-alunos' || $path == 'admin'){ ?>
				<form class="navbar-form navbar-right" role="search" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Pesquisar aluno" name="busca">
					</div>
					<button type="submit" class="btn btn-default">OK</button>
				</form>
			<?php } ?>
		</div>
	</nav>

	<?php
		switch($path){
			case '':
			case 'admin':
			case 'admin/listar-alunos':
				require_once("pgs/listar-alunos.php");
				break;
			case 'admin/alterar-aluno':
				require_once("pgs/alterar-aluno.php");
				break;
			case 'admin/cadastrar-aluno':
				require_once("pgs/cadastrar-aluno.php");
				break;
			case 'admin/visualizar-aluno':
				require_once("pgs/visualizar-aluno.php");
				break;
			case 'admin/top3-alunos':
				require_once("pgs/top3-alunos.php");
				break;
			case 'admin/excluir-aluno':
				require_once("pgs/excluir-aluno.php");
				break;
			case 'admin/listar-usuarios':
				require_once("pgs/listar-usuarios.php");
				break;
			case 'admin/alterar-usuario':
				require_once("pgs/alterar-usuario.php");
				break;
			case 'admin/cadastrar-usuario':
				require_once("pgs/cadastrar-usuario.php");
				break;
			case 'admin/excluir-usuario':
				require_once("pgs/excluir-usuario.php");
				break;
			default: require_once("../pgs/404.php");
				break;
		}
	?>
	<footer class="footer">
		<p>Todos os direitos resevados - <?php echo date('Y'); ?></p>
	</footer>
</div>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>