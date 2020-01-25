<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sistema</title>
		<link href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
		<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div id="navbar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?php echo BASE_URL;?>">Sistema 1</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo BASE_URL;?>login/entrar">Login</a></li>
						<li><a href="<?php echo BASE_URL;?>login/cadastrar">Cadastrar</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<h1>Login</h1>
			<?php if(!empty($erro)): ?>
			<div class="alert alert-danger"><?php echo $erro;?></div>
			<?php endif;?>
			<form method="POST">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input id="email" type="email" class="form-control" name="email"/>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input id="senha" type="password" class="form-control" name="senha"/>
				</div>
				<button type="submit" class="btn btn-default">Entrar</button>
			</form>
		</div>
	</body>
</html>