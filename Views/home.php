<div class="row">
	<div class="col-sm-8">xxx</div>
	<div class="col-sm-4">
		<div class="widget"><h4>Requisições de amizade</h4></div>
		<div class="widget"><h4>Sugestões de amigos</h4>
		<?php foreach ($sugestoes as $pessoa):?>
			<div class="sugestaoitem">
    			<strong><?php echo $pessoa['nome']?></strong>
				<button class="btn btn-default pull-right" onclick="addFriend('<?php echo $pessoa['id']?>', this)">+</button>			
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
