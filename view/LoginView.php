<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>SPC</title>

   
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    	<link rel="shortcut icon" href="view/PAGINA_WEB/images/favicon.png">
    
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="view/bootstrap/otros/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="view/bootstrap/otros/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!--===============================================================================================-->
    	
    	<link rel="stylesheet" type="text/css" href="view/bootstrap/otros/login/css/main.css">
    <!--===============================================================================================-->
    
  </head>

  <body>
  
  
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			   
								
				<form class="login100-form validate-form" action="<?php echo $helper->url("Usuarios","Loguear"); ?>" method="post" >
					
						
						<center>
						<H3><b>Iniciar Sesión</b></H3><br>
						<img src="view/PAGINA_WEB/images/logo_perfil.png" alt="IMG">
						</center>
					<br>
    					
    				
					<div class="wrap-input100 validate-input" data-validate = "Cedula es requerida">
						<input class="input100" type="text" id="usuario" name="usuario" placeholder="Cedula..">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password es requerido">
						<input class="input100" type="password" id="clave" name="clave" placeholder="Password..">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
                   
                   <div class="container-login100-form-btn">
				     <a class="login100-form-btn_cancel" href="<?php  echo $helper->url("Iniciar","index"); ?>">CANCELAR</a>
                          
					</div>
                   
					

					
						<br><br>
							
							  <?php if (isset($resultSet)) {?>
							<?php if ($resultSet != "") {?>
						
								 <?php if ($error == TRUE) {?>
								    <div class="row">
								    <div class="col-lg-12 col-md-12 col-xs-12">
								 	<div class="alert alert-danger" role="alert"><?php echo $resultSet; ?></div>
								 	</div>
								 	</div>
								 <?php } else {?>
								    <div class="row">		
								    <div class="col-lg-12 col-md-12 col-xs-12">	
								    <div class="alert alert-info" role="alert"><?php echo $resultSet; ?></div>
								    </div>
								    </div>
								    
								  
								    
								 <?php sleep(5); ?>
				     
				     			 <?php }?>
							
					        <?php } ?>
					        <?php } ?>  
						
					
					
					
				</form>
			</div>
		</div>
	</div>
	
	
  
  
  
  
				        
					        
    
    
    
    
<!--===============================================================================================-->	
	<script src="view/bootstrap/otros/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="view/bootstrap/otros/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="view/bootstrap/otros/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="view/bootstrap/otros/login/js/main.js"></script>
    
   
  </body>
</html>
