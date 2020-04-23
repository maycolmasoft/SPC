
var id_usuarios_chat=0;
var nombre_usuarios_chat="";
var html_chat = "";



$(document).ready( function (){
	
	//$(":input").inputmask();
	Cargar_Chats();
	
	
	setInterval(function(){
		Cargar_Chats();
		
		/*if($("#id_usuarios").val()){
			
		
			Cargar_Mensajes($("#id_usuarios").val());
			
		}*/
		
		
	}, 200);
	
	
	
});

 $('body').on('click', '#nuevo_mensaje', function(){
    
	var id_usuarios  = $("#id_usuarios").val();
	
	$.ajax({
	    url: 'index.php?controller=Chat&action=ActualizarLeidos',
	    type: 'POST',
	    dataType:"json",
	    data: {id_usuarios:id_usuarios},
	   
	})
	.done(function(x) {
		
		
	if(x.hasOwnProperty('id')){
	   		
	   		if(x.id>0){
	   			
	   			Cargar_Chats();
	   	   
	   		}
	   		
	   	}
		
        
	})
	.fail(function() {
	    console.log("error");
	});
	
	
  });





function Cargar_Chats(){
		
		$.ajax({
		    url: 'index.php?controller=Chat&action=CargarChats',
		    type: 'POST',
		    data: null,
		})
		.done(function(x) {
			
	       
			$("#chat_activos").html(x);
			
	        
		})
		.fail(function() {
		    console.log("error");
		});
		
		
	
}






function Cargar_Mensajes(id_usuarios_chat_remitente){
	
	
	
	$.ajax({
		    url: 'index.php?controller=Chat&action=CargarMensajes',
		    type: 'POST',
		    data: {
		    	id_usuarios_chat_remitente: id_usuarios_chat_remitente
		    	
		    },
		})
		.done(function(x) {
			
	       
			$("#mensajes").html(x);
			
			
			
			
			 var html_chat='<form  method="post">'+
	              '<div class="input-group">'+
	                '<input type="text" id ="nuevo_mensaje" name="nuevo_mensaje" placeholder="Escribe un mensaje..." class="form-control">'+
	                '<input type="hidden" id ="id_usuarios" name="id_usuarios" value="'+id_usuarios_chat_remitente+'" placeholder="" class="form-control">'+
	                '<span class="input-group-btn">'+
	                      '<button type="button" class="btn btn-warning btn-flat"  onclick="Enviar('+id_usuarios_chat_remitente+')">Enviar</button>'+
	                    '</span>'+
	              '</div>'+
	            '</form>';
			
			 $("#footer").html("");
			 $("#footer").html(html_chat);
	        
		})
		.fail(function() {
		    console.log("error");
		});
		
		
	
}






function Enviar(id_usuarios_chat_receptor){
	
	var nuevo_mensaje = $("#nuevo_mensaje").val();
	
	if(nuevo_mensaje=="" || nuevo_mensaje.length==0){
	$("#nuevo_mensaje").notify("Ingrese Mensaje",{ position:"buttom left", autoHideDelay: 2000});
			return false;
	} 
	
	$.ajax({
	    url: 'index.php?controller=Chat&action=EnviarMensaje',
	    type: 'POST',
	    dataType:"json",
	    data: {
	    	nuevo_mensaje: nuevo_mensaje,
	    	id_usuarios_chat_receptor: id_usuarios_chat_receptor
	    	
	    },
	})
	.done(function(x) {
	   
	   	if(x.hasOwnProperty('id')){
	   		
	   		if(x.id>0){
	   			
	   			Cargar_Mensajes(id_usuarios_chat_receptor);
	   	   
	   		}
	   		
	   	}
	    
	})
	.fail(function() {
	    console.log("error");
	});
	
}







