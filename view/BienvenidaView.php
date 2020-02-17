<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Capremci</title>
   <?php include("view/modulos/links.php"); ?>
   
		
		<link rel="stylesheet" href="view/css/estilos.css">
		<link rel="stylesheet" href="view/vendors/table-sorter/themes/blue/style.css">
	
	
	
		    <!-- Bootstrap -->
    		<link href="view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    		<!-- Font Awesome -->
		    <link href="view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		    <!-- NProgress -->
		    <link href="view/vendors/nprogress/nprogress.css" rel="stylesheet">
		    
		   
		    <!-- Custom Theme Style -->
		    <link href="view/build/css/custom.min.css" rel="stylesheet">
				
			  <link rel="stylesheet" href="view/AdminLTE-2.4.2/plugins/iCheck/all.css">
			<!-- Datatables -->
		    <link href="view/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		 
		   		

			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script type="text/javascript" src="view/vendors/table-sorter/jquery.tablesorter.js"></script> 
    
   
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include("view/modulos/logo.php"); ?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
			<?php include("view/modulos/menu_profile.php"); ?>
            <!-- /menu profile quick info -->

            <br />
			<?php include("view/modulos/menu.php"); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
		<?php include("view/modulos/head.php"); ?>	
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div id='pone_cta_individual'></div>
            <div id='pone_cta_desembolsar'></div>
            <div id='pone_alerta_actualizacion'></div>
          </div>
          
           <div class="row tile_count">
            <div id='pone_credito_ordinario'></div>
            <div id='pone_credito_emergente'></div>
            <div id='pone_credito_2x1'></div>
           </div>
          
           <div class="row tile_count">
            <div id='pone_credito_hipotecario'></div>
            <div id='pone_acuerdo_pago'></div>
            <div id='pone_credito_refinanciamiento'></div>
	       </div>
	       
	       
	      <div class="row tile_count">
          <div id='pone_publicidad'></div> 
          </div>
          
        </div>
     


          <br />

	
              
            
          </div>
          
          
          
          
          
          
          <!-- PARA ENCUESTAS EDUCACIÓN FINANCIERA -->
          
        
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
           <div class="modal-header">
         
              <h3 style="margin-left: 15px;"><strong>Educación Financiera.</strong></h3>
           </div>
           <div class="modal-body">
          
          <div class="col-lg-12 col-md-12 col-xs-12">
          
          <div class="col-lg-7 col-md-7 col-xs-12">
              
           			<iframe id="reproducir_video" width="100%" height="550px"></iframe>
           			
          </div>
          <div class="col-lg-5 col-md-5 col-xs-12">
          
          
          <div id="encuesta1" style="display:none;">
          
          <h4><strong>Estimado Participe.</strong></h4>
          <br>
          <p>Porque su opinión es muy importante para nosotros, observe el video hasta el final y ayúdenos llenando una breve encuesta que aparecera en unos minutos al finalizar el video.</p>
           	
          <img src="view/images/Encuesta.png" class="img-rounded" alt="Cinque Terre" style="width: 100%; margin-top: 20px;"/> 
          
          </div>
          
          
       <div id="encuesta" style="display:none;">
       
       	<form  action="<?php echo $helper->url("EducacionFinanciera","InsertaEducacionFinanciera"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12">
        
          <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-user'></i> Encuesta Educación Financiera</h4>
	         </div>
	         <div class="panel-body">
			 
			         
           
			 
			 <div class="row">
			 	<label  class="control-label"><?php echo $pregunta_1;?></label>
			    <input type="hidden" id="pregunta_1" name="pregunta_1" value="<?php echo $id_pregunta_1;?>">
			     <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 15px;">
				  <div class="row">
				  
				           <div class="col-lg-2 col-md-2 col-xs-12">
				            <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_1" name="respuesta_pregunta_1" value="TRUE" class="flat-red">
			                  Si
			                </span>
			                </div>
			                </div>
			                
			                <div class="col-lg-2 col-md-2 col-xs-12">
			                <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_11" name="respuesta_pregunta_1" value="FALSE" class="flat-red">
			                  No
			                </span>
			                </div>
			                </div>
			              
		          </div>        
	                
	            </div>
              </div>
			 
			 
           
           
               <div class="row">
			 	<label class="control-label"><?php echo $pregunta_2;?></label>
			     <input type="hidden" id="pregunta_2" name="pregunta_2" value="<?php echo $id_pregunta_2;?>">
			     <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 25px;">
				  <div class="row">
				  
				           <div class="col-lg-2 col-md-2 col-xs-12">
				            <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_2" name="respuesta_pregunta_2" value="TRUE" class="flat-red">
			                  Si
			                </span>
			                </div>
			                </div>
			                
			                <div class="col-lg-2 col-md-2 col-xs-12">
			                <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_22" name="respuesta_pregunta_2" value="FALSE" class="flat-red">
			                  No
			                </span>
			                </div>
			                </div>
			                
			               
		          </div>        
	                    
	                    
	             
	            </div>
              </div>
           
           
            
            
            
            
               <div class="row">
			 	<label value="<?php echo $id_pregunta_3;?>" class="control-label"><?php echo $pregunta_3;?></label>
			    <input type="hidden" id="pregunta_3" name="pregunta_3" value="<?php echo $id_pregunta_3;?>">
			     <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 25px;">
				  <div class="row">
				  
				           <div class="col-lg-2 col-md-2 col-xs-12">
				            <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_3" name="respuesta_pregunta_3" value="TRUE" class="flat-red">
			                  Si
			                </span>
			                </div>
			                </div>
			                
			                <div class="col-lg-2 col-md-2 col-xs-12">
			                <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_33" name="respuesta_pregunta_3" value="FALSE" class="flat-red">
			                  No
			                </span>
			                </div>
			                </div>
			                
		          </div>        
	                    
	              
	            </div>
              </div>
        
              
           
           
           
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_4;?></label>
			     <input type="hidden" id="pregunta_4" name="pregunta_4" value="<?php echo $id_pregunta_4;?>">
			     <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 15px;">
				  <div class="row">
				  
				           <div class="col-lg-2 col-md-2 col-xs-12">
				            <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_4" name="respuesta_pregunta_4" value="TRUE" class="flat-red">
			                  Si
			                </span>
			                </div>
			                </div>
			                
			                <div class="col-lg-2 col-md-2 col-xs-12">
			                <div class="form-group">
			                <span>
			                  <input type="radio" id="respuesta_pregunta_44" name="respuesta_pregunta_4" value="FALSE" class="flat-red">
			                  No
			                </span>
			                </div>
			                </div>
			                
		          </div>        
	                    
	                
	            </div>
              </div>
        
           
			  			<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
				  		 <button type="submit" id="generar" name="generar" value=""   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-edit"></i> Registrar Encuesta</button>         
					    </div>
  			
  		</div></div>	
         
      
      
       </form>
          
      </div> 
          
          
          
          </div>
          </div>
            
             
             <p>....</p>
         		
          
          </div>
           
	      </div>
	     </div>
	   </div>
          
          <!-- TERMINA ENCUESTAS EDUCACIÓN FINANCIERA -->
          
          
          
          
          
          
          
          <!-- INICIA ACTIUALIZACION DE PROPOGANDA -->
      
	   
	    
          <div class="modal fade" id="mostrarmodal_propaganda" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
           <div class="modal-header">
         
              <h3 style="margin-left: 15px;"><strong>Actualiza tu Información.</strong></h3>
           </div>
           <div class="modal-body">
          
          <div class="col-lg-12 col-md-12 col-xs-12">
          
          
          
        <div class="col-lg-7 col-md-7 col-xs-12">
       	<form  action="<?php echo $helper->url("Usuarios","ActualizaPropagandaActualizacion"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12">
        
         <div class="row">             			
            			<div class="col-lg-8 col-xs-12 col-md-8">
                    		    <div class="form-group">
                                                      <label for="cedula_usuarios" class="control-label">Cedula:</label>
                                                      <input type="text" class="form-control" id="cedula_usuarios" name="cedula_usuarios" value="<?php echo $_SESSION["cedula_usuarios"]; ?>"  placeholder="cedula .." readonly>
                                                      <div id="mensaje_cedula_usuarios" class="errores"></div>
                                </div>
                        </div>
        </div>
        
        
         <div class="row">             			
            			<div class="col-lg-8 col-xs-12 col-md-8">
                    		    <div class="form-group">
                                                      <label for="nombre_usuarios" class="control-label">Nombres:</label>
                                                      <input type="text" class="form-control" id="nombre_usuarios" name="nombre_usuarios" value="<?php echo $_SESSION["nombre_usuarios"]; ?>"  placeholder="nombre ..">
                                                      <div id="mensaje_nombre_usuarios" class="errores"></div>
                                </div>
                        </div>
        </div>
        
        
        <div class="row">             			
            			<div class="col-lg-8 col-xs-12 col-md-8">
                    		    <div class="form-group">
                                                      <label for="fecha_nacimiento_usuarios" class="control-label">Fecha Nacimiento:</label>
                                                      <input type="date" class="form-control" id="fecha_nacimiento_usuarios" name="fecha_nacimiento_usuarios" value=""  placeholder="fecha ..">
                                                      <div id="mensaje_fecha_nacimiento_usuarios" class="errores"></div>
                                </div>
                        </div>
        </div>
        
        
       <div class="row">
                        		    <div class="col-lg-8 col-xs-12 col-md-8">
                        		    <div class="form-group">
                                                          <label for="correo_usuarios" class="control-label">Correo:</label>
                                                          <input type="email" class="form-control" id="correo_usuarios" name="correo_usuarios" value="" placeholder="correo..">
                                                          <div id="mensaje_correo_usuarios" class="errores"></div>
                                    </div>
                        		    </div>
      </div>
        
        
        <div class="row">
                        <div class="col-lg-8 col-xs-12 col-md-8">
                		    <div class="form-group">
                                                  <label for="celular_usuarios" class="control-label">Celular:</label>
                                                  <input type="text" class="form-control" id="celular_usuarios" name="celular_usuarios" value=""  placeholder="celular..">
                                                  <div id="mensaje_celular_usuarios" class="errores"></div>
                            </div>
                	    </div>
                            		    
         </div>   
        
        
        <div class="row">
                        <div class="col-lg-8 col-xs-12 col-md-8">
                		    <div class="form-group">
                                                  <label for="telefono_usuarios" class="control-label">Teléfono:</label>
                                                  <input type="text" class="form-control" id="telefono_usuarios" name="telefono_usuarios" value=""  placeholder="teléfono..">
                                                  <div id="mensaje_telefono_usuarios" class="errores"></div>
                            </div>
                	    </div>
                            		    
         </div>                   		    
       
        
      
      
      
			         
			  			<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: left; margin-top: 10px">
				  		 <button type="submit" id="actualizar" name="actualizar" value=""   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-edit"></i> Actualizar Información</button>         
					    </div>
  			
  			
       </form>
      </div> 
          
          
         <div class="col-lg-5 col-md-5 col-xs-12">
          
          <h4><strong>Estimado Participe.</strong></h4>
          <br>
          <p>Ayúdenos actualizando su información personal.</p>
           	
          <img src="view/images/Encuesta.png" class="img-rounded" alt="Cinque Terre" style="width: 100%; margin-top: 20px;"/> 
         
          </div>
          
         
        
          </div>
            
             
             <p>....</p>
         		
          
          </div>
           
	      </div>
	     </div>
	   </div>
	  
          
          <!-- TERMINA ACTUALIZACION DE PROPAGANDA  -->
          
          
          
          
          
          
          
          
          
         <!-- PARA ENCUESTAS DE LOS SERVICIOS ONLINE  
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 style="margin-left: 15px;">Encuesta Servicios Online.</h3>
           </div>
           <div class="modal-body">
          
          <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="col-lg-5 col-md-5 col-xs-12">
          
          <h4>Estimado Participe.</h4>
          <br>
          <p>Porque tu opinión es muy importante para nosotros, ayúdanos a mejorar nuestros servicios online llenando esta breve encuesta.</p>
           	
          
          </div>
          <div class="col-lg-7 col-md-7 col-xs-12">
              <img src="view/images/Encuesta.png" class="img-rounded" alt="Cinque Terre" style="width: 100%"/> 
           
          </div>
          
          </div>
            
             
              <a href="index.php?controller=Encuestas&action=index"  style="margin-left: 15px;" class="btn btn-warning" ><i class="glyphicon glyphicon-edit"> Comenzar</i></a>
    	  
         		
          
          </div>
           <div class="modal-footer">
           
            <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
	      </div>
	     </div>
	   </div>
          
            -->  
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
    
   
    
    <!-- Bootstrap -->
    <script src="view/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    
    
    <!-- NProgress -->
    <script src="view/vendors/nprogress/nprogress.js"></script>
   
   
    <!-- Datatables -->
    <script src="view/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    
    
    <script src="view/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    
    
    
    <!-- Custom Theme Scripts -->
    <script src="view/build/js/custom.min.js"></script>
	
	<!-- codigo de las funciones -->
	
	<script src="view/js/jquery.blockUI.js"></script>
	
	
<script src="view/AdminLTE-2.4.2/plugins/iCheck/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
  $(function () {

 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    
    })
</script>
	
	
<script type="text/javascript">
$(document).ready(function() {

	setTimeout(function() {
        $("#encuesta1").fadeIn(1500);
    },200);
	
	setTimeout(function() {
        $("#encuesta1").fadeOut(1500);
    },280400);
	
    setTimeout(function() {
        $("#encuesta").fadeIn(1500);
    },280500);

    
});
</script>
	
	
	
	
       <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#generar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;

		    	var respuesta_pregunta_1 = $("#respuesta_pregunta_1").val();
		    	var respuesta_pregunta_2 = $("#respuesta_pregunta_2").val();
		    	var respuesta_pregunta_3 = $("#respuesta_pregunta_3").val();
		    	var respuesta_pregunta_4 = $("#respuesta_pregunta_4").val();
		    	

				
    	        if($("#respuesta_pregunta_1").is(':checked') || $("#respuesta_pregunta_11").is(':checked')) {  
	
    	        } else {  

    	        	swal("Alerta!", "Conteste Pregunta 1", "error")
                    return false;
    	        		
    	        }  


    	        
    	        if($("#respuesta_pregunta_2").is(':checked') || $("#respuesta_pregunta_22").is(':checked')) {  
	
    	        } else {  

    	        	swal("Alerta!", "Conteste Pregunta 2", "error")
	        		 return false;
	        	
    	        } 

    	        if($("#respuesta_pregunta_3").is(':checked') || $("#respuesta_pregunta_33").is(':checked')) {  
	
    	        } else {  

    	        	swal("Alerta!", "Conteste Pregunta 3", "error")
	        		 return false;
    	        } 


    	        if($("#respuesta_pregunta_4").is(':checked') || $("#respuesta_pregunta_44").is(':checked')) {  
    
    	        } else {  

    	        	swal("Alerta!", "Conteste Pregunta 4", "error")
	        		 return false;
    	        } 

		    	   
		    	
			}); 


		       
		       
		}); 

	</script>
        
       
       
       
       
       
       
       
	
       <script >

       function addZero(i) {
           if (i < 10) {
               i = '0' + i;
           }
           return i;
       }
       
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#actualizar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;

		    	var cedula_usuarios = $("#cedula_usuarios").val();
		    	var celular_usuarios = $("#celular_usuarios").val();
		    	var telefono_usuarios = $("#telefono_usuarios").val();
		    	var correo_usuarios  = $("#correo_usuarios").val();
		    	var fecha_nacimiento_usuarios  = $("#fecha_nacimiento_usuarios").val();
		    	
		    	var hoy = new Date();
		        var dd = hoy.getDate();
		        var mm = hoy.getMonth()+1;
		        var yyyy = hoy.getFullYear();
		        
		        dd = addZero(dd);
		        mm = addZero(mm);



		        var fecha_actual = yyyy+'-'+mm+'-'+dd;


		      
				
    	        if(cedula_usuarios=="") {  
    	        	swal("Alerta!", "Ingrese Cédula", "error")
                    return false;
    	        } 

    	       
    	        if(fecha_nacimiento_usuarios=="") {  
    	        	swal("Alerta!", "Ingrese Fecha Nacimiento", "error")
                    return false;

        	    }else {


        	    	/*
        	    	if(fecha_nacimiento_usuarios >= fecha_actual ){

        	        	swal("Alerta!", "Fecha Nacimiento Incorrecta", "error")
                        return false;
        	    	}


        	    	if(fecha_nacimiento_usuarios < '1920-01-01' ){

        	        	swal("Alerta!", "Fecha Nacimiento Incorrecta.", "error")
                        return false;
        	    	}
            	    */
        	    } 

        	    
    	        if(correo_usuarios=="") {  
    	        	swal("Alerta!", "Ingrese Correo", "error")
                    return false;
    	        } else if (regex.test($('#correo_usuarios').val().trim()))
		    	{
		    		 
				}
		    	else 
		    	{
		    		swal("Alerta!", "Ingrese Correo Válido", "error")
		            return false;	
			    }




    	        
    	        if(celular_usuarios=="") {  
    	        	swal("Alerta!", "Ingrese Número Celular", "error")
                    return false;

        	    }else {


        	    	 if(isNaN(celular_usuarios)){

         	        	swal("Alerta!", "Ingrese Números.", "error")
                         return false;
                 	    }

        	    	
            	    if(celular_usuarios.length==10){

    	        	
            	    }else{
            	    	swal("Alerta!", "Ingrese Número Valido 10 Dgts.", "error")
                        return false;
                	}
        	    } 



    	        if(telefono_usuarios=="") {  
    	        	swal("Alerta!", "Ingrese Número Telefónico", "error")
                    return false;

        	    }else {


        	    	 if(isNaN(telefono_usuarios)){

         	        	swal("Alerta!", "Ingrese Números.", "error")
                         return false;
                 	    }

        	    	
            	    if(telefono_usuarios.length==9){

    	        	
            	    }else{

            	    	swal("Alerta!", "Ingrese Número Telefónico Valido 9 Dgts.", "error")
                        return false;
                	}
        	    } 

    	        

		    	
			}); 


		       
		       
		}); 

	</script>
       
       
	
	
	 <script type="text/javascript">
     
        	   $(document).ready( function (){
        		   pone_espera();
        		   
        		   //load_encuesta();
        		   load_propaganda_actualizacion();
        		   pone_cta_individual();
        		   pone_cta_desembolsar();
        		   pone_alerta_actualizacion();
        		   pone_credito_ordinario();
        		   pone_credito_emergente();
        		   pone_credito_2x1();
        		   pone_credito_hipotecario();
        		   pone_acuerdo_pago();
        		   pone_credito_refinanciamiento();	
        		   cargar_banner();
        		    
	   			});



        	   function load_propaganda_actualizacion(){
        		     
    	    	   $.ajax({
    	                    url: 'index.php?controller=Usuarios&action=propaganda_actualizacion_datos',
    	                    type: 'POST',
    	                    //data_type:json
    	                    data: {action:'ajax'},
    	                    success: function(D){

    	                    	if (D.trim()=="NO"){
									
									$("#mostrarmodal_propaganda").modal("show");
									
								}
    	                    	
    	                    	
    	                    }
    	             });

    	    	  
  	             
    	        }


        	   
        	   function load_encuesta(){
      		     
    	    	   $.ajax({
    	                    url: 'index.php?controller=Usuarios&action=consulta_encuesta_educacion_financiera',
    	                    type: 'POST',
    	                    //data_type:json
    	                    data: {action:'ajax'},
    	                    success: function(D){

    	                    	if (D.trim()=="NO"){
									
									$("#mostrarmodal").modal("show");
									//$('#mostrarmodal').modal({backdrop: 'static', keyboard: false})
	    	                    	video();
	    	                    	
								}
    	                    	
    	                    	
    	                    }
    	             });

    	    	  
  	             
    	        }
        	        
        	   
        	   

        	   function pone_espera(){

        		   $.blockUI({ 
        				message: '<h4><img src="view/images/load.gif" /> Espere por favor, estamos procesando su requerimiento...</h4>',
        				css: { 
        		            border: 'none', 
        		            padding: '15px', 
        		            backgroundColor: '#000', 
        		            '-webkit-border-radius': '10px', 
        		            '-moz-border-radius': '10px', 
        		            opacity: .5, 
        		            color: '#fff',
        		           
        	        		}
        	    });
            	
		        setTimeout($.unblockUI, 1000); 
		        
        	   }
        	   
        	   function pone_cta_individual(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_cta_individual").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_cta_individual',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_cta_individual").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_cta_individual").html("Ocurrio un error al cargar la informacion de cuenta individual..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }


        	   function pone_cta_desembolsar(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_cta_desembolsar").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_cta_desembolsar',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_cta_desembolsar").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_cta_desembolsar").html("Ocurrio un error al cargar la cuenta desembolsar..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }


        	   function pone_alerta_actualizacion(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_alerta_actualizacion").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=alerta_actualizacion',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_alerta_actualizacion").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_alerta_actualizacion").html("Ocurrio un error al cargar la alerta de actuaización..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }
        	   

        	   

        	   
        	   function pone_credito_ordinario(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_credito_ordinario").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_credito_ordinario',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_credito_ordinario").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_credito_ordinario").html("Ocurrio un error al cargar la informacion de crédito ordinario..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }


        	   function pone_credito_emergente(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_credito_emergente").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_credito_emergente',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_credito_emergente").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_credito_emergente").html("Ocurrio un error al cargar la informacion de crédito emergente..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }



        	   function pone_credito_2x1(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_credito_2x1").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_credito_2x1',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_credito_2x1").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_credito_2x1").html("Ocurrio un error al cargar la informacion de crédito 2x1..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }





        	   function pone_credito_hipotecario(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_credito_hipotecario").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_credito_hipotecario',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_credito_hipotecario").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_credito_hipotecario").html("Ocurrio un error al cargar la informacion de crédito hipotecario..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }


        	   function pone_acuerdo_pago(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_acuerdo_pago").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_acuerdo_pago',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_acuerdo_pago").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_acuerdo_pago").html("Ocurrio un error al cargar la informacion de acuerdo de pago..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }
        	   


        	   function pone_credito_refinanciamiento(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_credito_refinanciamiento").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_credito_refinanciamiento',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_credito_refinanciamiento").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_credito_refinanciamiento").html("Ocurrio un error al cargar la informacion de crédito refinanciamiento..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }



        	   function cargar_banner(){
        		   $(document).ready( function (){
        		       $.ajax({
        		                 beforeSend: function(objeto){
        		                   $("#pone_publicidad").html('')
        		                 },
        		                 url: 'index.php?controller=Usuarios&action=cargar_banner',
        		                 type: 'POST',
        		                 data: null,
        		                 success: function(x){
        		                   $("#pone_publicidad").html(x);
        		                 },
        		                error: function(jqXHR,estado,error){
        		                  $("#pone_publicidad").html("Ocurrio un error al cargar la informacion de publicidad..."+estado+"    "+error);
        		                }
        		              });
        		     })
        		  }



        	  

        	   
        </script>
        
        <script type="text/javascript">
	
	


		
    	function video(){
    
    			    imgficha = 'view/images/educacion financiera modulo 1.mp4';
    
    		        $("#reproducir_video").attr({'src':imgficha});
    	}
	
	//setInterval(video, 10);
	
	</script>
      
  </body>
</html>
