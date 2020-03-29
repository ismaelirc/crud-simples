$(document).ready(function(){

	$('#formNoticia').validate({
		rules:{
			titulo:{
				required:true,
				minlength:3
			},
			descricao:{
				required:true,
				minlength:3
			}
		},
		submitHandler:function(form,e){
			e.preventDefault();
			$.LoadingOverlay("show");

			var dados = $(form).serialize();

			var url = $(form).attr('action')+'/salvar';
			var options = {type: "POST",
						   data: dados};
			
			$.fn.ajax_send(url,options).done(function(data){
				$("#idNoticia").val(data.idNoticia);
				
				$.fn.sweet_alert({icon: 'success',title: 'Oww',text: 'Notícia publicada!'});
				
			}).fail(function(data){
				
				$.fn.sweet_alert({icon: 'error',title: 'Oops...',text: 'Algo deu errado, tente novamente.'});
				
			}).always(function(){

				$.LoadingOverlay("hide");

			});

			return false;
		}
	});

	$("#deletar").on('click',function(){

		if(!window.confirm('Deseja deletar esta notícia?')){
			return;
		}		

		$.LoadingOverlay("hide");

		var dados = {idNoticia: $("#idNoticia").val()};

		var url = $("#formNoticia").attr('action')+'/deletar';
		var options = {type: "POST",
					data: dados};
		
		$.fn.ajax_send(url,options).done(function(data){
			
			window.location.href = data.url_location;
			
		}).fail(function(data){
			
			$.fn.sweet_alert({icon: 'error',title: 'Oops...',text: 'Não foi possível deletar esta notícia.'});
			
		}).always(function(){

			$.LoadingOverlay("hide");

		});

		return false;
	})

});
