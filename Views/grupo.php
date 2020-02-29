<h1><?php echo $info['titulo']; ?>(<?php echo $qt_membros; ?> membro<?php echo ($qt_membros == '1')? '':'s'?>)</h1>
<?php if ($is_membro):?>
Você é membro, parabéns
<?php else: ?>
	<h3>Você não é membro deste grupo.</h3>
	<a href="<?php echo BASE_URL; ?>grupo/entrar/<?php echo $id_grupo; ?>" class="btn btn-default">Entrar no Grupo</a>
<?php endif;?>