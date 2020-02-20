<!DOCTYPE html>
<html lang="en">
  <head>
   <script lang=javascript src="view/Contable/FuncionesJS/xlsx.full.min.js"></script>
   <script lang=javascript src="view/Contable/FuncionesJS/FileSaver.min.js"></script>
    
    
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPC</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="view/css/estilos.css">
		
   <link rel="shortcut icon" href="view/PAGINA_WEB/images/favicon.png">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">  
      
   <?php include("view/modulos/links_css.php"); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="view/bootstrap/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    
   
  </head>

  <body class="hold-transition skin-blue fixed sidebar-mini">

 <?php  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        $DateString = (string)$fecha;
  ?>
    
    
  <div class="wrapper">
  <header class="main-header">
  
      <?php include("view/modulos/logo.php"); ?>
      <?php include("view/modulos/head.php"); ?>	
    
  </header>

   <aside class="main-sidebar">
    <section class="sidebar">
     <?php include("view/modulos/menu_profile.php"); ?>
      <br>
     <?php include("view/modulos/menu.php"); ?>
    </section>
  </aside>

  <div class="content-wrapper">
   		<section class="content-header">
            <h1>
            
            	<small><?php echo $fecha; ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $helper->url("Usuarios","Bienvenida"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Usuarios</li>
            </ol>
        </section>
        
        <!-- comienza diseño controles usuario -->
        
        <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Usuarios</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
            </div>
            
            <div class="box-body">
            
                <form  action="<?php echo $helper->url("Usuarios","InsertaUsuarios"); ?>" method="post" enctype="multipart/form-data" class="col-lg-12 col-md-12 col-xs-12">
          		 	  <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
              		 	
              		 	                		   
                    		   
                    		 <div class="row">
                    		    <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                      <label for="cedula_usuarios" class="control-label">Cedula:</label>
                                                      <input type="number" class="form-control" id="cedula_usuarios" name="cedula_usuarios" value="<?php echo $resEdit->cedula_usuarios; ?>"  placeholder="ci-ruc.." readonly>
                                                      <input type="hidden" class="form-control" id="id_usuarios" name="id_usuarios" value="<?php echo $resEdit->id_usuarios; ?>" >
                                                      <div id="mensaje_cedula_usuarios" class="errores"></div>
                                </div>
                                </div>
                    		    
                    		    
                    		    <div class="col-lg-6 col-xs-12 col-md-6">
                    		    <div class="form-group">
                                                      <label for="nombre_usuarios" class="control-label">Nombres:</label>
                                                      <input type="text" class="form-control" id="nombre_usuarios" name="nombre_usuarios" value="<?php echo $resEdit->nombre_usuarios; ?>" placeholder="nombres..">
                                                      <div id="mensaje_nombre_usuarios" class="errores"></div>
                                </div>
                                
                                
                    		    </div>
                    		    
                    		   <!--<div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                      <label for="usuario_usuario" class="control-label">Usuario</label>
                                                      <input type="text" class="form-control" id="usuario_usuario" name="usuario_usuario" value="" placeholder="usuario..">
                                                      <div id="mensaje_usuario_usuario" class="errores"></div>
                                </div>
                                </div>
                    			--> 
                    			
                    				<div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="clave_usuarios" class="control-label">Password:</label>
                                                          <input type="password" class="form-control" id="clave_usuarios" name="clave_usuarios" value="<?php echo $resEdit->pass_sistemas_usuarios; ?>" placeholder="(solo números..)" maxlength="4" onkeypress="return numeros(event)">
                                                          <div id="mensaje_clave_usuarios" class="errores"></div>
                                    </div>
                        		    </div>
                        		    
                        		    <div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="clave_usuarios_r" class="control-label">Repita Password:</label>
                                                          <input type="password" class="form-control" id="clave_usuarios_r" name="clave_usuarios_r" value="<?php echo $resEdit->pass_sistemas_usuarios; ?>" placeholder="(solo números..)" maxlength="4" onkeypress="return numeros(event)">
                                                          <div id="mensaje_clave_usuarios_r" class="errores"></div>
                                    </div>
                                    </div>
                    	       </div>
                    			
                               
                    			
                    			<div class="row">
                    		       <div class="col-lg-2 col-xs-12 col-md-2">
                            		    <div class="form-group">
                                                              <label for="telefono_usuarios" class="control-label">Teléfono:</label>
                                                              <input type="text" class="form-control" id="telefono_usuarios" name="telefono_usuarios" value="<?php echo $resEdit->telefono_usuarios; ?>"  placeholder="teléfono..">
                                                              <div id="mensaje_telefono_usuarios" class="errores"></div>
                                        </div>
                            	    </div>
                            		    
                            		    
                    			
                        			<div class="col-lg-2 col-xs-12 col-md-2">
                                		    <div class="form-group">
                                                                  <label for="celular_usuarios" class="control-label">Celular:</label>
                                                                  <input type="text" class="form-control" id="celular_usuarios" name="celular_usuarios" value="<?php echo $resEdit->celular_usuarios; ?>"  placeholder="celular..">
                                                                  <div id="mensaje_celular_usuarios" class="errores"></div>
                                            </div>
                                    </div>
                        		    <div class="col-lg-4 col-xs-12 col-md-4">
                        		    <div class="form-group">
                                                          <label for="correo_usuarios" class="control-label">Correo:</label>
                                                          <input type="email" class="form-control" id="correo_usuarios" name="correo_usuarios" value="<?php echo $resEdit->correo_usuarios; ?>" placeholder="email..">
                                                          <div id="mensaje_correo_usuarios" class="errores"></div>
                                    </div>
                        		    </div>
                        		    
                        		    
                        		    
                        		    <div class="col-lg-4 col-xs-12 col-md-4">
                        		    <div class="form-group">
                                                          <label for="fotografia_usuarios" class="control-label">Fotografía:</label>
                                                          <input type="file" class="form-control" id="fotografia_usuarios" name="fotografia_usuarios" value="">
                                                          <div id="mensaje_usuario" class="errores"></div>
                                    </div>
                        		    </div>
                        		
								     
                        		    
                        		    
                        		     <div class="col-xs-12 col-md-3 col-md-3">
                        		   <div class="form-group">
                                                          <label for="id_rol" class="control-label">Rol:</label>
                                                          <select name="id_rol" id="id_rol"  class="form-control" >
                                                          <option value="0" selected="selected">--Seleccione--</option>
                        									<?php foreach($resultRol as $res) {?>
                        										<option value="<?php echo $res->id_rol; ?>" <?php if ($res->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $res->nombre_rol; ?> </option>
                        							        <?php } ?>
                        								   </select> 
                                                          <div id="mensaje_id_rol" class="errores"></div>
                                    </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-3 col-md-3">
                        		   <div class="form-group">
                                                          <label for="id_estado" class="control-label">Estado:</label>
                                                          <select name="id_estado" id="id_estado"  class="form-control" >
                                                          <option value="0" selected="selected">--Seleccione--</option>
                        									<?php foreach($resultEst as $res) {?>
                        										<option value="<?php echo $res->id_estado; ?>" <?php if ($res->id_estado == $resEdit->id_estado )  echo  ' selected="selected" '  ;  ?> ><?php echo $res->nombre_estado; ?> </option>
                        							        <?php } ?>
                        								   </select> 
                                                          <div id="mensaje_id_estado" class="errores"></div>
                                    </div>
                                    </div>
                                
                                </div>
                             
                             
                             
                           
                              
                                
                      <?php } } else {?>                		    
                      	  
                      	  
                      	            		   
                    		   
                    		 <div class="row">
                    		    <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                      <label for="cedula_usuarios" class="control-label">Cedula:</label>
                                                      <input type="number" class="form-control" id="cedula_usuarios" name="cedula_usuarios" value=""  placeholder="cedula..">
                                                      <div id="mensaje_cedula_usuarios" class="errores"></div>
                                </div>
                                </div>
                    		    
                    		    
                    		    <div class="col-lg-6 col-xs-12 col-md-6">
                    		    <div class="form-group">
                                                      <label for="nombre_usuarios" class="control-label">Nombres:</label>
                                                      <input type="text" class="form-control" id="nombre_usuarios" name="nombre_usuarios" value="" placeholder="nombres..">
                                                      <div id="mensaje_nombre_usuarios" class="errores"></div>
                                </div>
                                
                                
                    		    </div>
                    		    <!-- 
                    		    <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                      <label for="usuario_usuario" class="control-label">Usuario</label>
                                                      <input type="text" class="form-control" id="usuario_usuario" name="usuario_usuario" value="" placeholder="usuario..">
                                                      <div id="mensaje_usuario_usuario" class="errores"></div>
                                </div>
                                </div>
                    			 -->
                    			
                    				<div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="clave_usuarios" class="control-label">Password:</label>
                                                          <input type="password" class="form-control" id="clave_usuarios" name="clave_usuarios" value="" placeholder="(solo números..)" maxlength="4" onkeypress="return numeros(event)">
                                                          <div id="mensaje_clave_usuarios" class="errores"></div>
                                    </div>
                        		    </div>
                        		    
                        		    <div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="clave_usuarios_r" class="control-label">Repita Password:</label>
                                                          <input type="password" class="form-control" id="clave_usuarios_r" name="clave_usuarios_r" value="" placeholder="(solo números..)" maxlength="4" onkeypress="return numeros(event)">
                                                          <div id="mensaje_clave_usuarios_r" class="errores"></div>
                                    </div>
                                    </div>
                    	       </div>
                    			
                               
                    			
                    			<div class="row">
                    		       <div class="col-lg-2 col-xs-12 col-md-2">
                            		    <div class="form-group">
                                                              <label for="telefono_usuarios" class="control-label">Teléfono:</label>
                                                              <input type="text" class="form-control" id="telefono_usuarios" name="telefono_usuarios" value=""  placeholder="teléfono..">
                                                              <div id="mensaje_telefono_usuarios" class="errores"></div>
                                        </div>
                            	    </div>
                            		    
                            		    
                    			
                        			<div class="col-lg-2 col-xs-12 col-md-2">
                                		    <div class="form-group">
                                                                  <label for="celular_usuarios" class="control-label">Celular:</label>
                                                                  <input type="text" class="form-control" id="celular_usuarios" name="celular_usuarios" value=""  placeholder="celular..">
                                                                  <div id="mensaje_celular_usuarios" class="errores"></div>
                                            </div>
                                    </div>
                        		    <div class="col-lg-4 col-xs-12 col-md-4">
                        		    <div class="form-group">
                                                          <label for="correo_usuarios" class="control-label">Correo:</label>
                                                          <input type="email" class="form-control" id="correo_usuarios" name="correo_usuarios" value="" placeholder="email..">
                                                          <div id="mensaje_correo_usuarios" class="errores"></div>
                                    </div>
                        		    </div>
                        		    
                        		    
                        		    
                        		    <div class="col-lg-4 col-xs-12 col-md-4">
                        		    <div class="form-group">
                                                          <label for="fotografia_usuarios" class="control-label">Fotografía:</label>
                                                          <input type="file" class="form-control" id="fotografia_usuarios" name="fotografia_usuarios" value="">
                                                          <div id="mensaje_usuario" class="errores"></div>
                                    </div>
                        		    </div>
                        		
								     
                        		    
                        		    
                        		    <div class="col-lg-2 col-xs-12 col-md-2">
                        		   <div class="form-group">
                                                          <label for="id_rol" class="control-label">Rol:</label>
                                                          <select name="id_rol" id="id_rol"  class="form-control" >
                                                          <option value="" selected="selected">--Seleccione--</option>
                        									<?php foreach($resultRol as $res) {?>
                        										<option value="<?php echo $res->id_rol; ?>" ><?php echo $res->nombre_rol; ?> </option>
                        							    
                        							        <?php } ?>
                        								   </select> 
                                                          <div id="mensaje_id_rol" class="errores"></div>
                                    </div>
                                    
                                    </div>
                                    
                                    <div class="col-lg-2 col-xs-12 col-md-2">
                        		   <div class="form-group">
                                                          <label for="id_estado" class="control-label">Estado:</label>
                                                          <select name="id_estado" id="id_estado"  class="form-control" >
                                                          <option value="" selected="selected">--Seleccione--</option>
                        									<?php foreach($resultEst as $res) {?>
                        										<option value="<?php echo $res->id_estado; ?>"><?php echo $res->nombre_estado; ?> </option>
                        							        <?php } ?>
                        								   </select> 
                                                          <div id="mensaje_id_estado" class="errores"></div>
                                    </div>
                                    </div>
                                
                                
                                </div>
                        	
                        	
                        	
                    		            
                     <?php } ?>                     
                     
          		 	 <div class="row">
                    		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:20px">
                    		    <div class="form-group">
                                                      <button type="submit" id="Guardar" name="Guardar" class="btn btn-success"><i class="glyphicon glyphicon-floppy-saved"> Guardar</i></button>
                                					  <a class="btn btn-primary" href="<?php  echo $helper->url("Usuarios","index"); ?>">CANCELAR</a>
                                </div>
                    		    </div>
                    		    </div>
          		 	
          		 	
          		 	
          		 	
          		 	
          		 	
          		 	
          		 	</form>
          
        			</div>
      			</div>
      			
      			
    		</section>
      <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Listado Usuarios</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
            </div>
            
            <div class="box-body">
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activos" data-toggle="tab">Usuarios Activos</a></li>
              <li><a href="#inactivos" data-toggle="tab">Usuarios Inactivos</a></li>
            </ul>
            
            <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="tab-content">
             
            <br>
              <div class="tab-pane active" id="activos">
              
                
					<div class="pull-right" style="margin-right:15px;">
					
						<input type="text" value="" class="form-control" id="search" name="search" onkeyup="load_usuarios(1)" placeholder="search.."/>
					</div>
					<div id="load_registrados" ></div>	
					<div id="users_registrados"></div>	
                
              </div>
              
              <div class="tab-pane" id="inactivos">
                
                    <div class="pull-right" style="margin-right:15px;">
					<input type="text" value="" class="form-control" id="search_inactivos" name="search_inactivos" onkeyup="load_usuarios_inactivos(1)" placeholder="search.."/>
					</div>
					
					
					<div id="load_inactivos_registrados" ></div>	
					<div id="users_inactivos_registrados"></div>
                
                
              </div>
             
         
            </div>
            </div>
          </div>
         
            
            </div>
            </div>
            </section>
  </div>
 	<?php include("view/modulos/footer.php"); ?>	
   <div class="control-sidebar-bg"></div>
 </div>
   <?php include("view/modulos/links_js.php"); ?> 
   
   <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="view/bootstrap/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="view/bootstrap/bower_components/jquery-ui-1.12.1/jquery-ui.js"></script> 
    <script src="view/bootstrap/otros/notificaciones/notify.js"></script>
    <script src="view/Administracion/js/validaCedula.js?0.02"></script>  
    <script src="view/Administracion/js/Usuarios.js?3.8"></script>   
    
    
    
      <script type="text/javascript">
     
        	   $(document).ready( function (){
        		 
        		   load_usuarios(1);
	   			});

        	  

        	   
        	   function load_usuarios(pagina){


        		   var search=$("#search").val();
                   var con_datos={
           					  action:'ajax',
           					  page:pagina
           					  };
                 $("#load_registrados").fadeIn('slow');
           	     $.ajax({
           	               beforeSend: function(objeto){
           	                 $("#load_registrados").html('<center><img src="view/images/ajax-loader.gif"> Cargando...</center>')
           	               },
           	               url: 'index.php?controller=Usuarios&action=index10&search='+search,
           	               type: 'POST',
           	               data: con_datos,
           	               success: function(x){
           	                 $("#users_registrados").html(x);
           	               	 $("#tabla_usuarios").tablesorter(); 
           	                 $("#load_registrados").html("");
           	               },
           	              error: function(jqXHR,estado,error){
           	                $("#users_registrados").html("Ocurrio un error al cargar la informacion de Usuarios..."+estado+"    "+error);
           	              }
           	            });


           		   }
        </script>
        
        
       
        
        
        <script type="text/javascript">

            enviando = false; //Obligaremos a entrar el if en el primer submit
            
            function checkSubmit(){
                if (!enviando){
            		enviando= true;
            		return true;
                } else {
                    //Si llega hasta aca significa que pulsaron 2 veces el boton submit
                  
                    return false;
                }
            }
        
        </script>
        
        
        
         
        <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#Guardar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;

		    	var cedula_usuarios = $("#cedula_usuarios").val();
		    	var nombre_usuarios = $("#nombre_usuarios").val();
		    	//var usuario_usuario = $("#usuario_usuario").val();
		    	var clave_usuarios = $("#clave_usuarios").val();
		    	var cclave_usuarios = $("#clave_usuarios_r").val();
		    	var celular_usuarios = $("#celular_usuarios").val();
		    	var correo_usuarios  = $("#correo_usuarios").val();
		    	var id_rol  = $("#id_rol").val();
		    	var id_estado  = $("#id_estado").val();
		    	
		    	
		    	if (cedula_usuarios == "")
		    	{
			    	
		    		$("#mensaje_cedula_usuarios").text("Introduzca Identificación");
		    		$("#mensaje_cedula_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_cedula_usuarios").fadeOut("slow"); //Muestra mensaje de error
		            
				}    
				
		    	if (nombre_usuarios == "")
		    	{
			    	
		    		$("#mensaje_nombre_usuarios").text("Introduzca un Nombre");
		    		$("#mensaje_nombre_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombre_usuarios").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		    	/*if (usuario_usuario == "")
		    	{
			    	
		    		$("#mensaje_usuario_usuario").text("Introduzca un Usuario");
		    		$("#mensaje_usuario_usuario").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_usuario_usuario").fadeOut("slow"); //Muestra mensaje de error
		            
				}   */
						    	
			
		    	if (clave_usuarios == "")
		    	{
		    		
		    		$("#mensaje_clave_usuarios").text("Introduzca una Clave");
		    		$("#mensaje_clave_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }else if (clave_usuarios.length<4){
			    	$("#mensaje_clave_usuarios").text("Introduzca minimo 4 números");
		    		$("#mensaje_clave_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}else if (clave_usuarios.length>4){
			    	$("#mensaje_clave_usuarios").text("Introduzca máximo 4 números");
		    		$("#mensaje_clave_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}
		    	else 
		    	{
		    		$("#mensaje_clave_usuarios").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	

		    	if (cclave_usuarios == "")
		    	{
		    		
		    		$("#mensaje_clave_usuarios_r").text("Introduzca una Clave");
		    		$("#mensaje_clave_usuarios_r").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_clave_usuarios_r").fadeOut("slow"); 
		            
				}
		    	
		    	if (clave_usuarios != cclave_usuarios)
		    	{
			    	
		    		$("#mensaje_clave_usuarios_r").text("Claves no Coinciden");
		    		$("#mensaje_clave_usuarios_r").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else
		    	{
		    		$("#mensaje_clave_usuarios_r").fadeOut("slow"); 
			        
		    	}	
				

				//los telefonos
		    	
		    	if (celular_usuarios == "" )
		    	{
			    	
		    		$("#mensaje_celular_usuarios").text("Ingrese un Celular");
		    		$("#mensaje_celular_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{


		    		if(isNaN(celular_usuarios)){

        				$("#mensaje_celular_usuarios").text("Ingrese Solo Números");
        	    		$("#mensaje_celular_usuarios").fadeIn("slow"); //Muestra mensaje de error
        	            return false;

					}
		    		
		    		if(celular_usuarios.length==10){

						$("#mensaje_celular_usuarios").fadeOut("slow"); //Muestra mensaje de error
					}else{
						
						$("#mensaje_celular_usuarios").text("Ingrese 10 dígitos");
			    		$("#mensaje_celular_usuarios").fadeIn("slow"); //Muestra mensaje de error
			            return false;
					}
  	
		            
				}

				// correos
				
		    	if (correo_usuarios == "")
		    	{
			    	
		    		$("#mensaje_correo_usuarios").text("Introduzca un correo");
		    		$("#mensaje_correo_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else if (regex.test($('#correo_usuarios').val().trim()))
		    	{
		    		$("#mensaje_correo_usuarios").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	else 
		    	{
		    		$("#mensaje_correo_usuarios").text("Introduzca un correo Valido");
		    		$("#mensaje_correo_usuarios").fadeIn("slow"); //Muestra mensaje de error
		            return false;	
			    }

		    	
		    	if (id_rol == 0 )
		    	{
			    	
		    		$("#mensaje_id_rol").text("Seleccione");
		    		$("#mensaje_id_rol").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_rol").fadeOut("slow"); //Muestra mensaje de error
		            
				}



		    	if (id_estado == 0 )
		    	{
			    	
		    		$("#mensaje_id_estado").text("Seleccione");
		    		$("#mensaje_id_estado").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_estado").fadeOut("slow"); //Muestra mensaje de error
		    		
				}
		    					    

			}); 


		        $( "#cedula_usuarios" ).focus(function() {
				  $("#mensaje_cedula_usuarios").fadeOut("slow");
			    });
				
				$( "#nombre_usuarios" ).focus(function() {
					$("#mensaje_nombre_usuarios").fadeOut("slow");
    			});
				/*$( "#usuario_usuario" ).focus(function() {
					$("#mensaje_usuario_usuario").fadeOut("slow");
    			});*/
    			
				$( "#clave_usuarios" ).focus(function() {
					$("#mensaje_clave_usuarios").fadeOut("slow");
    			});
				$( "#clave_usuarios_r" ).focus(function() {
					$("#mensaje_clave_usuarios_r").fadeOut("slow");
    			});
				
				$( "#celular_usuarios" ).focus(function() {
					$("#mensaje_celular_usuarios").fadeOut("slow");
    			});
				
				$( "#correo_usuarios" ).focus(function() {
					$("#mensaje_correo_usuarios").fadeOut("slow");
    			});
			
				$( "#id_rol" ).focus(function() {
					$("#mensaje_id_rol").fadeOut("slow");
    			});

				$( "#id_estado" ).focus(function() {
					$("#mensaje_id_estado").fadeOut("slow");
    			});
				
		      
				    
		}); 

	</script>
        
        
        
        
    <script >   
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
    if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
     }
    </script> 
    
    
    
    
    
    
    
    
    
    
    
    
          	
  </body>
</html>

 