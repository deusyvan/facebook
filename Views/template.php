<html>
	<head>
		<title>Sistema</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<li><a href="<?php echo BASE_URL;?>cadastrar">Cadastrar</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    	</div>
	</body>
</html>
