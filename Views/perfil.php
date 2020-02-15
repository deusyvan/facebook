<h1>Editar Perfil</h1>
<form method="POST">
	<div class="form-group">
		<label for="nome">Nome</label>
		<input id="nome" type="text" class="form-control" name="nome" value="<?php echo $info['nome'];?>" />
	</div>
	<div class="form-group">
		<label for="senha">Senha</label>
		<input id="senha" type="password" class="form-control" name="senha"/>
	</div>
	<div class="form-group">
		<label for="bio">Biografia</label>
		<textarea id="bio" class="form-control" name="bio" ><?php echo $info['bio'];?></textarea>
	</div>
	<div class="form-group">
		<strong>E-mail</strong><br>
		<?php echo $info['email']?>
	</div>
	<div class="radio"><strong>Sexo:</strong><br>
		<?php 
		  if ($info['sexo'] == 0) {
		      echo 'Feminino';
		  } else {
		      echo 'Masculino';
		  }
		?>
	</div>
	
	<button type="submit" class="btn btn-default">Salvar</button>
</form>