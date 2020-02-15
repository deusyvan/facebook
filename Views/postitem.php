<div class="postitem">
    <?php if($tipo == 'foto'):?>
    	<img src="<?php  echo BASE_URL;?>assets/images/posts/<?php echo $url;?>" border="0" width="100%" />
    <?php endif; ?>
    <div class="postitem_texto">
        <?php echo $texto;?>
    </div>
</div>