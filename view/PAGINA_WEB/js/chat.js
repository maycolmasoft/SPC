
var id_usuarios_chat=0;
var nombre_usuarios_chat="";
var html_chat = "";
var html_footer = "";


$(document).ready( function (){
	
	
	Verificar_Sesion();
	
	
		
		setInterval(function(){
			
			
			   Cargar_Mensajes();
			
		
		
		}, 200);	

	
	
	
	
});


 $('body').on('click', '#nuevo_mensaje', function(){
    
	
	
	$.ajax({
	    url: 'index.php?controller=Iniciar&action=ActualizarLeidos',
	    type: 'POST',
	    dataType:"json",
	    data: null,
	   
	})
	.done(function(x) {
		
		
	if(x.hasOwnProperty('id')){
	   		
	   		if(x.id>0){
	   			
	   			Cargar_NumeroMensajesSinLeer();
	   	   
	   		}
	   		
	   	}
		
        
	})
	.fail(function() {
	    console.log("error");
	});
	
	
  });


 
 
 
 
 


 function Verificar_Sesion(){
 	
 	$.ajax({
 	    url: 'index.php?controller=Iniciar&action=verificar_sesion',
 	    type: 'POST',
 	    dataType:"json",
 	    data: null,
 	})
 	.done(function(x) {
 	   
 	   	if(x.hasOwnProperty('id')){
 	   		
 	   		if(x.id>0){
 	   			
 	   		Cargar_Mensajes();
 	   	   
	 	   	  html_chat='<form  method="post">'+
					         '<div class="input-group">'+
					           '<input type="text" id ="nuevo_mensaje" name="nuevo_mensaje" placeholder="Escribe un mensaje..." class="form-control">'+
					           '<span class="input-group-btn">'+
					                 '<button type="button" class="btn btn-warning btn-flat" onclick="Enviar()">Enviar</button>'+
					           '</span>'+
					         '</div>'+
					       '</form>';
		
		 $("#footer_chat").html("");
		 $("#footer_chat").html(html_chat);
 	   		
 	   		
 	   		}else{
 	   			
 	   		
 	   		$("#mensajes").html("");	
 	   		$("#mensajes").html(x.valor);
 	   		
 	   		
 	   		
 	   	    html_footer='<button type="button" class="btn btn-warning btn-block" id="Iniciar" name="Iniciar" onclick="Iniciar()">Iniciar Chat</button>';
	
			 $("#footer_chat").html("");
			 $("#footer_chat").html(html_footer);
 	   		
 	   		
 	   		}
 	   		
 	   	}
 	    
 	})
 	.fail(function() {
 	    console.log("error");
 	});
 	
 }
 
 
 



function Iniciar(){
	
	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	var nombre = $("#nombre").val();
	var email = $("#email").val();
	var numero_celular = $("#numero_celular").val();
	
	 var tiempo = tiempo || 1000;
	
	if(nombre=="" || nombre.length==0){
		$("#nombre").notify("Ingrese Nombre",{ position:"buttom left", autoHideDelay: 2000});
			return false;
	} 
	
	
	if (email == "" || email.length==0)
	{
 		$("#email").notify("Ingrese Correo",{ position:"buttom left", autoHideDelay: 2000});
		return false;
    }
	else if (regex.test($('#email').val().trim()))
	{
		
		if (numero_celular == "" || numero_celular.length==0)
		{
			$("#numero_celular").notify("Ingrese Número Celular",{ position:"buttom left", autoHideDelay: 2000});
			return false;
	    }
		else 
		{
			if(isNaN(numero_celular)){

				$("#numero_celular").notify("Ingrese solo Números",{ position:"buttom left", autoHideDelay: 2000});
				return false;

			}
			
			if(numero_celular.length<10 || numero_celular.length>10){

				$("#numero_celular").notify("Número celular no valido",{ position:"buttom left", autoHideDelay: 2000});
				return false;
			}
	        
		}
	}
	else 
	{
		$("#email").notify("Ingrese Correo Valido",{ position:"buttom left", autoHideDelay: 2000});
		return false;
    }
	
	
	
	$.ajax({
	    url: 'index.php?controller=Iniciar&action=IniciarChat',
	    type: 'POST',
	    dataType:"json",
	    data: {
	    	nombre: nombre,
	    	email: email,
	    	numero_celular: numero_celular
	    	
	    },
	})
	.done(function(x) {
		
       
   	if(x.hasOwnProperty('id')){
   		
   		if(x.id>0){
   			
   			id_usuarios_chat = x.id;
   	   		nombre_usuarios_chat = x.nombre_usuarios;
   	   		
   	   		console.log("id ====>" + id_usuarios_chat);
   	   		console.log("nombre ====>" + nombre_usuarios_chat);
   			
   	   		
   	   	$("#mensajes").html("");		
   	   	Cargar_Mensajes();
   	
   	  html_chat='<form  method="post">'+
      '<div class="input-group">'+
        '<input type="text" id ="nuevo_mensaje" name="nuevo_mensaje" placeholder="Escribe un mensaje..." class="form-control">'+
        '<span class="input-group-btn">'+
              '<button type="button" class="btn btn-warning btn-flat" id="comprobar" onclick="Enviar()">Enviar</button>'+
        '</span>'+
      '</div>'+
    '</form>';

$("#footer_chat").html("");
$("#footer_chat").html(html_chat);


$('#cancel').show();
   	
   		}
   		
   	}
       
       
	    
	})
	.fail(function() {
	    console.log("error");
	});
	
	
	
}



function Cargar_Mensajes(){
	
		$.ajax({
		    url: 'index.php?controller=Iniciar&action=CargarMensajes',
		    type: 'POST',
		    data: {
		    	id_usuarios_chat: id_usuarios_chat
		    	
		    },
		})
		.done(function(x) {
			
			
	       
			$("#mensajes1").html(x);
			
			Cargar_NumeroMensajesSinLeer();
		   		
		   		
	        
		})
		.fail(function() {
		    console.log("error");
		});
		
		
	
}




function Cargar_NumeroMensajesSinLeer(){
	
	$.ajax({
	    url: 'index.php?controller=Iniciar&action=CargarMensajesSinLeer',
	    type: 'POST',
	    data: {
	    	id_usuarios_chat: id_usuarios_chat
	    	
	    },
	})
	.done(function(x) {
		
		$("#numero_mensajes").html(x);
		
	})
	.fail(function() {
	    console.log("error");
	});
	
	

}



function Enviar(){
	
	var nuevo_mensaje = $("#nuevo_mensaje").val();
	
	if(nuevo_mensaje=="" || nuevo_mensaje.length==0){
	//$("#nuevo_mensaje").notify("Ingrese Mensaje",{ position:"buttom left", autoHideDelay: 2000});
			return false;
	} 
	
	$.ajax({
	    url: 'index.php?controller=Iniciar&action=EnviarMensaje',
	    type: 'POST',
	    dataType:"json",
	    data: {
	    	nuevo_mensaje: nuevo_mensaje
	    	
	    },
	})
	.done(function(x) {
	   
	   	if(x.hasOwnProperty('id')){
	   		
	   		if(x.id>0){
	   			$("#nuevo_mensaje").val("");
	   			Cargar_Mensajes();
	   	   
	   		}
	   		
	   	}
	    
	})
	.fail(function() {
	    console.log("error");
	});
	
}




function Cerrar_Sesion(){
	
	swal("¿Esta seguro de Finalizar el Chat?", {
		 title:"¿Esta seguro de Finalizar el Chat?",
		 icon:"info", 
		 dangerMode: true,
		 text:"Se cerrara tu sesión",
		  buttons: {
		    cancelar: "Cancelar",
		    aceptar: "Aceptar",
		  },
		})
		.then((value) => {
		  switch (value) {
		 
		    case "cancelar":
		      return;
		    case "aceptar":		      
		    	
		    	$.ajax({
		    	    url: 'index.php?controller=Iniciar&action=CerrarSesion',
		    	    type: 'POST',
		    	    dataType:"json",
		    	    data: null
		    	})
		    	.done(function(x) {
		    	   
		    	   	if(x.hasOwnProperty('id')){
		    	   			
		    	   		
		    	   		id_usuarios_chat = x.id;
		    	   		
		    	   		Verificar_Sesion();
		    	   		$('#cancel').css('display','none');
		    	   		$("#numero_mensajes").html("");
		    	   	}
		    	    
		    	})
		    	.fail(function() {
		    	    console.log("error");
		    	});
		    	
		  }
		  });
	
	
	
}








