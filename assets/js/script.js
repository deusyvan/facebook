//Recebendo o obj do proprio btn que foi clicado "this"
function addFriend(id, obj){
	//alert("adicionando amigo: "+id);
	if(id != ''){
		
		//Pegando o objeto pela classe e ocultando numa animação
		$(obj).closest('.sugestaoitem').fadeOut();
				$.ajax({
			type: 'POST',
			url:'ajax/add_friend',
			data:{id:id}
		});
	}
}

function aceitarFriend(id, obj){
	if(id != ''){
		$(obj).closest('.requisicaoitem').fadeOut();
				$.ajax({
			type: 'POST',
			url:'ajax/aceitar_friend',
			data:{id:id}
		});
	}
}

function curtir(obj){
	
	var id = $(obj).attr('data-id');
	var likes = parseInt($(obj).attr('data-likes'));
	var liked = parseInt($(obj).attr('data-liked'));
	//Analisa o liked para curtir ou descurtir
	if(liked == 0){
		likes++;
		liked = 1;
		var texto = 'Descurtir';
	} else {
		likes--;
		liked = 0;
		var texto = 'Curtir';
	}
	
	//Atualiza o objeto conforme definido anteriormente
	$(obj).attr('data-likes', likes);
	$(obj).attr('data-liked', liked);
	
	//Altera o texto do botão conforme o like
	$(obj).html('('+likes+') '+texto);	
	
	//Chama o controller pelo ajax e atualiza
	$.ajax({
		type: 'POST',
		url: 'ajax/curtir',
		data:{id:id}
	});
}


function displayComentario(obj){
	
	//Buscar a div superior (pai) ao botão que acionou a função. Depois busca a div postitem_comentario. E exibe a div
	$(obj).closest('.postitem_botoes').find('.postitem_comentario').show();
}

function comentar(obj){
	//Busca o id do post
	var id = $(obj).attr('data-id');
	//Volta na div pai pra buscar o texto
	var txt = $(obj).closest('.postitem_comentario').find('.postitem_txt').val();
	//Chama o ajax para executar o controller ajax na ação comentar
	$.ajax({
		type: 'POST',
		url: 'ajax/comentar',
		data:{id:id, txt:txt},
		success: function(){
			//Fecha a div
			$(obj).closest('.postitem_comentario').hide();
			//busca atraves da div pai o campo de txt e Limpa
			$(obj).closest('.postitem_comentario').find('.postitem_txt').val('');
		}
	});
	
	window.location.href = "/facebook";
}