<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPC</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="view/PAGINA_WEB/images/favicon.png">
    
    
   <?php include("view/modulos/links_css.php"); ?>
   
  </head>
   
  <body class="hold-transition skin-blue fixed sidebar-mini">   
  <?php
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
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
            <li class="active">Roles</li>
          </ol>
        </section>
        
        
        
        
        
     <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Chats</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked" id="chat_activos">
                
              </ul>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        
        
        <div class="col-md-9">
                 <div class="box box-warning direct-chat direct-chat-warning">
   		          <div class="box-header with-border">
   		            <h3 class="box-title">Mensajes Chat en Linea</h3>
   		            <div class="box-tools pull-right">
   		               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
   		              </button>
   		            </div>
   		          </div>
   		          <div class="box-body">
   		            <div class="direct-chat-messages" id="mensajes">
   		            
   		           
   		            </div>
   		                  
   		          </div>
   		          <div class="box-footer" id="footer">
   		            
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
   <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="view/bootstrap/otros/inputmask_bundle/jquery.inputmask.bundle.js"></script>  
    <script src="view/PAGINA_WEB/js/chat_admin.js?4"></script>
    
    
    <script src="view/bootstrap/otros/notificaciones/notify.js"></script>
    	
  </body>
</html>


       
       
      
 




