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