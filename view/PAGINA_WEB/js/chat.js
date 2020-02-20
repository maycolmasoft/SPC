
var id_usuarios_chat=0;
var nombre_usuarios_chat="";
var html_chat = "";
var tiempo = tiempo || 1000;


$(document).ready( function (){
	
	//$(":input").inputmask();
	Info();
	
	
	/*setInterval(function(){
		Cargar_Mensajes();
	}, 200);	
*/
	
	jQuery("html,body").animate({scrollTop: jQuery("#numero_celular").offset().top-50}, 500, 'swing', function() { 
	       alert("Finished animating");
	    });
	 
	
});




function Info()
{
	
	$.ajax({
	    url: 'index.php?controller=Iniciar&action=verificar_sesion',
	    type: 'POST',
	    dataType:"json",
	    data: null
	})
	.done(function(x) {
		
	
   	if(x.hasOwnProperty('id')){
   		
   			id_usuarios_chat = x.id;
   			
   			if(id_usuarios_chat > 0){
   				
   		       html_chat='<div class="back-to-top col-lg-3 col-md-4 col-xs-10" >'+
   		        '<div class="box box-warning direct-chat direct-chat-warning">'+
   		         ' <div class="box-header with-border">'+
   		          '  <h3 class="box-title">Chat en Linea</h3>'+
   		           ' <div class="box-tools pull-right">'+
   		            '  <span data-toggle="tooltip" title="Nuevos Mensajes" class="badge bg-yellow" id="numero_mensajes"></span>'+
   		             ' <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>'+
   		              '</button>'+
   		             
   		            '<button type="button" class="btn btn-box-tool" data-widget="remove" title="Cerrar Chat" onclick="Cerrar_Sesion()"><i class="fa fa-times"></i>'+
			           '</button>'+
   		            '</div>'+
   		          '</div>'+
   		          '<div class="box-body">'+
   		           ' <div class="direct-chat-messages" id="mensajes">'+
   		            
   		           
   		            '</div>'+
   		         ' <div class="scroll" id="scroll"></div>'+               
   		         ' </div>'+
   		         ' <div class="box-footer">'+
   		           ' <form  method="post">'+
   		            '  <div class="input-group">'+
   		              '  <input type="text" id ="nuevo_mensaje" name="nuevo_mensaje" placeholder="Escribe un mensaje..." class="form-control">'+
   		             '   <span class="input-group-btn">'+
   		              '        <button type="button" class="btn btn-warning btn-flat"  onclick="Enviar()">Enviar</button>'+
   		              '      </span>'+
   		             ' </div>'+
   		           ' </form>'+
   		         ' </div>'+
   		       ' </div>'+
   		      
   		      '</div>';

   		$("#iniciar_chat").html("");
   		$("#iniciar_chat").html(html_chat);
   				
   		
   		Cargar_Mensajes();
   		
   			}else{
   				
   				html_chat=
   					  '<div class="back-to-top col-lg-3 col-md-4 col-xs-10">'+
   			     '<div class="box box-warning direct-chat direct-chat-warning collapsed-box">'+
   			       '<div class="box-header with-border">'+
   			       '  <h3 class="box-title">Chat en Linea</h3>'+
   			       '  <div class="box-tools pull-right">'+
   			        '   <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">1</span>'+
   			         '  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>'+
   			          ' </button>'+
   			             '<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>'+
   			           '</button> -->'+
   			         '</div>'+
   			       '</div>'+
   			      
   			       '<div class="box-body" style="display: none;">'+
   			       
   			     '<div class="direct-chat-messages">'+
   			     '<div class="box-body box-profile">'+
   			    '<img class="profile-user-img img-responsive img-circle" src="view/PAGINA_WEB/images/logo_perfil.png" alt="User profile picture">'+

   			     '<h5 class="profile-username text-center">SPC Solutions</h5>'+
   			     '<p class="text-muted text-center">Desarrolladores de Software</p>'+
   			     
   			    '<div class="form-group has-feedback">'+
   			     '<input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">'+
   			       '<span class="glyphicon glyphicon-user form-control-feedback"></span>'+
   			     '</div>'+
   			     '<div class="form-group has-feedback">'+
   			      ' <input type="email" class="form-control" placeholder="Email" id="email" name="email">'+
   			       '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>'+
   			     '</div>'+
   			     
   			    ' <div class="form-group has-feedback">'+
   			     '  <input type="number" class="form-control" id="numero_celular" name="numero_celular">'+
   			      ' <span class="glyphicon glyphicon-phone form-control-feedback"></span>'+
   			     '</div>'+
   			   '</div>'+
   			'</div>'+
   			'</div>'+

   			      
   			       '<div class="box-footer" style="display: none;">'+
   			        '  <button type="button" class="btn btn-warning btn-block" id="Iniciar" name="Iniciar" onclick="Iniciar()">Iniciar Chat</button>'+
   			       '</div>'+
   			     '</div>'+
   			   '</div>';
   				
   				
   				$("#iniciar_chat").html(html_chat);
   				
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
   			
   	 	Info();	
   	 window.location.reload();	
   	
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
			
	       
			$("#mensajes").html(x);
			
			
			/*$("#nuevo_mensaje").animate({ 
				scrollTop: $(document).height() 
			}, "fast");
			*/
	        
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
	   			
	   	 	Info();	
	   	   
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
		    	   		
		    	   		window.location.reload();	
		    	   	   
		    	   	}
		    	    
		    	})
		    	.fail(function() {
		    	    console.log("error");
		    	});
		    	
		  }
		  });
	
	
	
}








