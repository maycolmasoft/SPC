<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Capremci 2018</title>


	  
	  
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="view/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="view/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="view/build/css/custom.min.css" rel="stylesheet">
    
       <script src="view/css/jquery.js"></script>
	  <script src="view/css/bootstrapValidator.min.js"></script>
	  <script src="view/css/ValidarLogin.js"></script>
    
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="view/images/logo.png" width="320" height="190">
            <form id="form-login" action="<?php echo $helper->url("Usuarios","Loguear"); ?>" method="post" ">
             
             
             
              <h1>Iniciar Sesión</h1>
              <div>
                <input id="usuario" name="usuario" type="text" class="form-control" placeholder="cedula.."/>
              </div>
              <div>
                <input id="clave" name="clave"   type="password" class="form-control" placeholder="password.."/>
              </div>
              <div>
              	<button type="submit"  class="btn btn-success" ><i class="fa fa-unlock fa-spin" aria-hidden="true"></i> Login</button>
                  <button type="button" onclick=" location.href='http://www.capremci.com.ec' " class="btn btn-primary" value="Cancelar" name="Cancelar"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button> 
             
              </div>

              <div class="clearfix"></div>
			   <div class="separator">
                <div class="clearfix"></div>
                <div>
                 <p><a href="<?php echo $helper->url("Usuarios","resetear_clave_inicio"); ?>" >Olvidaste tu Clave</a> </p>
                 <p>©2018 All Rights Reserved</p>
                </div>
              </div>
              
                       
                    	
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
								    <div class="alert alert-success" role="alert"><?php echo $resultSet; ?></div>
								    </div>
								    </div>
								    
								  
								    
								 <?php sleep(5); ?>
				     
				     			 <?php }?>
							
					        <?php } ?>
					        <?php } ?>  
                    		   
              
            </form>
          </section>
        </div>

              </div>
    </div>
    
  
  </body>
</html>
