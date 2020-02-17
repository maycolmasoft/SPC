<?php
class UsuariosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    



    
    
    
    
    
    
    
    public function index10(){
    	 
    	session_start();
		$id_rol=$_SESSION["id_rol"];
    	$usuarios = new UsuariosModel();
    	$where_to="";
    	$columnas = " usuarios.id_usuarios,
								  usuarios.cedula_usuarios,
								  usuarios.nombre_usuarios,
								  usuarios.clave_usuarios,
								  usuarios.pass_sistemas_usuarios,
								  usuarios.telefono_usuarios,
								  usuarios.celular_usuarios,
								  usuarios.correo_usuarios,
								  rol.id_rol,
								  rol.nombre_rol,
								  estado.id_estado,
								  estado.nombre_estado,
								  usuarios.fotografia_usuarios,
								  usuarios.creado";
    		
    	$tablas   = "public.usuarios,
								  public.rol,
								  public.estado";
    		
    	$where    = " rol.id_rol = usuarios.id_rol AND
								  estado.id_estado = usuarios.id_estado";
    		
    	$id       = "usuarios.id_usuarios";
    		
    	
    	
    	
    	
    	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    	$search =  (isset($_REQUEST['search'])&& $_REQUEST['search'] !=NULL)?$_REQUEST['search']:'';
    	
    	
    	
    	
    	if($action == 'ajax')
    	{
    		
    		if(!empty($search)){
    			 
    			 
    			$where1=" AND (usuarios.cedula_usuarios LIKE '".$search."%' OR usuarios.nombre_usuarios LIKE '".$search."%' OR usuarios.correo_usuarios LIKE '".$search."%' OR rol.nombre_rol LIKE '".$search."%' OR estado.nombre_estado LIKE '".$search."%')";
    			 
    			$where_to=$where.$where1;
    		}else{
    		
    			$where_to=$where;
    			 
    		}
    		
    		$html="";
    		$resultSet=$usuarios->getCantidad("*", $tablas, $where_to);
    		$cantidadResult=(int)$resultSet[0]->total;
    		
    		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    		
    		$per_page = 50; //la cantidad de registros que desea mostrar
    		$adjacents  = 9; //brecha entre páginas después de varios adyacentes
    		$offset = ($page - 1) * $per_page;
    		
    		$limit = " LIMIT   '$per_page' OFFSET '$offset'";
    		
    		$resultSet=$usuarios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
    		$count_query   = $cantidadResult;
    		$total_pages = ceil($cantidadResult/$per_page);
    		
    			
    		
    		
    		
    	if($cantidadResult>0)
    	{
    
    		$html.='<div class="pull-left" style="margin-left:11px;">';
    		$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
    		$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
    		$html.='</div>';
    		$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
			$html.='<section style="height:425px; overflow-y:scroll;">';
    		$html.= "<table id='tabla_usuarios' class='tablesorter table table-striped table-bordered dt-responsive nowrap'>";
    		$html.= "<thead>";
    		$html.= "<tr>";
    		$html.='<th style="text-align: left;  font-size: 12px;"></th>';
    		$html.='<th style="text-align: left;  font-size: 12px;"></th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Cedula</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Nombre</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Teléfono</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Celular</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Correo</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Rol</th>';
    		$html.='<th style="text-align: left;  font-size: 12px;">Estado</th>';
    		if($id_rol==1 || $id_rol==43){
	    		
    			$html.='<th style="text-align: left;  font-size: 12px;"></th>';
	    		$html.='<th style="text-align: left;  font-size: 12px;"></th>';
	    		$html.='<th style="text-align: left;  font-size: 12px;"></th>';
	    		
    		}else{
    			
    		
    			$html.='<th style="text-align: left;  font-size: 12px;"></th>';
    		}
    		$html.='</tr>';
    		$html.='</thead>';
    		$html.='<tbody>';
    		 
    		$i=0;
    		
    		foreach ($resultSet as $res)
    		{
    			$i++;
    			$html.='<tr>';
    			$html.='<td style="font-size: 11px;"><img src="view/DevuelveImagenView.php?id_valor='.$res->id_usuarios.'&id_nombre=id_usuarios&tabla=usuarios&campo=fotografia_usuarios" width="80" height="60"></td>';
    			$html.='<td style="font-size: 11px;">'.$i.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->cedula_usuarios.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->nombre_usuarios.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->telefono_usuarios.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->celular_usuarios.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->correo_usuarios.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->nombre_rol.'</td>';
    			$html.='<td style="font-size: 11px;">'.$res->nombre_estado.'</td>';
    			if($id_rol==1 || $id_rol==43 ){
    				
    				$html.='<td style="font-size: 18px;"><span class="pull-right"><a href="index.php?controller=Usuarios&action=index&id_usuarios='.$res->id_usuarios.'" class="btn btn-success" style="font-size:65%;"><i class="glyphicon glyphicon-edit"></i></a></span></td>';
    				$html.='<td style="font-size: 18px;"><span class="pull-right"><a href="index.php?controller=Usuarios&action=borrarId&id_usuarios='.$res->id_usuarios.'" class="btn btn-danger" style="font-size:65%;"><i class="glyphicon glyphicon-trash"></i></a></span></td>';
    				$html.='<td style="font-size: 18px;"><span class="pull-right"><a href="index.php?controller=Usuarios&action=search&cedula='.$res->cedula_usuarios.'" target="_blank" class="btn btn-warning" style="font-size:65%;"><i class="glyphicon glyphicon-eye-open"></i></a></span></td>';
    				
    				
    			}else{
    				
    				$html.='<td style="font-size: 18px;"><span class="pull-right"><a href="index.php?controller=Usuarios&action=search&cedula='.$res->cedula_usuarios.'" target="_blank" class="btn btn-warning" style="font-size:65%;"><i class="glyphicon glyphicon-eye-open"></i></a></span></td>';
    				
    			}
    			$html.='</tr>';
    		}
    		
    		
    		$html.='</tbody>';
    		$html.='</table>';
    		$html.='</section></div>';
    		$html.='<div class="table-pagination pull-right">';
    		$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
    		$html.='</div>';
    		
    		
    	
    
    		 
    	}else{
    		$html.='<div class="col-lg-6 col-md-6 col-xs-12">';
    		$html.='<div class="alert alert-warning alert-dismissable" style="margin-top:40px;">';
    		$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    		$html.='<h4>Aviso!!!</h4> <b>Actualmente no hay usuarios registrados...</b>';
    		$html.='</div>';
    		$html.='</div>';
    	}
    	
    	
    	
    	 
    	echo $html;
    	die();
    	 
    	} 
    	 
    	 
    	 
    	 
    	 
    }
    
    
	
	
	
	
	
	
	
       
       
       
       
       
       
       
       
       
       
       
       
	
	
    
public function index(){
	
		session_start();
		if (isset(  $_SESSION['nombre_usuarios']) )
		{
				//Creamos el objeto usuario
			$rol=new RolesModel();
			$resultRol = $rol->getAll("nombre_rol");
			$resultSet="";
			$estado = new EstadoModel();
			$resultEst = $estado->getAll("nombre_estado");
			
			$usuarios = new UsuariosModel();

			$nombre_controladores = "Usuarios";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $usuarios->getPermisosEditar("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
			
					
					$resultEdit = "";
			
					if (isset ($_GET["id_usuarios"])   )
					{
						
						
						$columnas = " usuarios.id_usuarios,
								  usuarios.cedula_usuarios,
								  usuarios.nombre_usuarios,
								  usuarios.clave_usuarios,
								  usuarios.pass_sistemas_usuarios,
								  usuarios.telefono_usuarios,
								  usuarios.celular_usuarios,
								  usuarios.correo_usuarios,
								  rol.id_rol,
								  rol.nombre_rol,
								  estado.id_estado,
								  estado.nombre_estado,
								  usuarios.fotografia_usuarios,
								  usuarios.creado";
						
						$tablas   = "public.usuarios,
								  public.rol,
								  public.estado";
						
						$id       = "usuarios.id_usuarios";
						
						$_id_usuarios = $_GET["id_usuarios"];
						$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado AND usuarios.id_usuarios = '$_id_usuarios' "; 
						$resultEdit = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id); 
					}
			
					
					$this->view("Usuarios",array(
							"resultSet"=>$resultSet, "resultRol"=>$resultRol, "resultEdit" =>$resultEdit, "resultEst"=>$resultEst
				
					));
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Usuarios"
			
				));
			
			}
			
		
		}
		else{
       	
       	$this->redirect("Usuarios","sesion_caducada");
       	
       }
		
	}
	
	
	
	
	
	public function llenar_fotografia_usuarios(){
	
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
	
	
		
		if ($_FILES['fotografia_usuarios']['tmp_name']!="")
		{
	
		$columnas = "usuarios.cedula_usuarios,
	   			     usuarios.pass_sistemas_usuarios";
			
		$tablas   = "public.usuarios";
			
		$where    = "octet_length(fotografia_usuarios)=0";
			
		$id       = "usuarios.id_usuarios";
			
		$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
	
	
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/webcapremci/fotografias_usuarios/';
		 
		$nombre = $_FILES['fotografia_usuarios']['name'];
		$tipo = $_FILES['fotografia_usuarios']['type'];
		$tamano = $_FILES['fotografia_usuarios']['size'];
		 
		move_uploaded_file($_FILES['fotografia_usuarios']['tmp_name'],$directorio.$nombre);
		$data = file_get_contents($directorio.$nombre);
		$imagen_usuarios = pg_escape_bytea($data);
		 
		 
		
	
		if(!empty($resultSet)){
				
			foreach ($resultSet as $res){
	
				$cedula=$res->cedula_usuarios;
				
				$colval = "fotografia_usuarios='$imagen_usuarios'";
				$tabla = "usuarios";
				$where = "cedula_usuarios = '$cedula'";
				$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
	
	
			}
				
		}
		
		
		
		$this->redirect("Roles", "index");
		
	 }
	 
	 
	 $this->view("SubirFotosUsuarios",array(
	 		"resultSet"=>""
	 
	 ));
	 
	
	}
	
	
	 
	
	public function rellenar_claves_usuarios_nuevos(){
		
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
		
		
		
		$columnas = "usuarios.cedula_usuarios";
			
		$tablas   = "public.usuarios";
			
		$where    = "1=1 AND CHARACTER_LENGTH(pass_sistemas_usuarios) >4";
			
		$id       = "usuarios.id_usuarios";
			
		$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
		
		if(!empty($resultSet))
			{
				foreach ($resultSet as $res){
					
					$cedula_usuarios=$res->cedula_usuarios;
					
					$cadena = "1234567890";
				$longitudCadena=strlen($cadena);
				$pass = "";
				$longitudPass=4;
				for($i=1 ; $i<=$longitudPass ; $i++){
					$pos=rand(0,$longitudCadena-1);
					$pass .= substr($cadena,$pos,1);
				}
				$_clave_usuario= $pass;
				$_encryp_pass = $usuarios->encriptar($_clave_usuario);
				$usuarios->UpdateBy("clave_usuarios = '$_encryp_pass', pass_sistemas_usuarios='$_clave_usuario'", "usuarios", "cedula_usuarios = '$cedula_usuarios'  ");
				
					
					
				}
				
				
					
			}
		
		
		
		$this->redirect("Roles", "index");
		
	}
	
	
	
	
	public function encriptar_maycol_postgres(){
		
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
		
		
		
		$columnas = "usuarios.cedula_usuarios,
	   			     usuarios.pass_sistemas_usuarios";
			
		$tablas   = "public.usuarios";
			
		$where    = "1=1 AND id_usuarios=13701";
			
		$id       = "usuarios.id_usuarios";
			
		$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
		
		
		
		if(!empty($resultSet)){
			
			foreach ($resultSet as $res){
				
				$cedula=$res->cedula_usuarios;
				$clave_usuarios = $usuarios->encriptar($res->pass_sistemas_usuarios);
				
				
				$colval = "cedula_usuarios= '$cedula', clave_usuarios='$clave_usuarios'";
				$tabla = "usuarios";
				$where = "cedula_usuarios = '$cedula'";
				$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
				
				
			}
			
		}
		
		$this->redirect("Roles", "index");
		
	}
	
	
	
	public function InsertaUsuarios(){
			
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
		
		if (isset(  $_SESSION['nombre_usuarios']) )
		{
	
		if (isset ($_POST["cedula_usuarios"]))
		{
			$_cedula_usuarios    = $_POST["cedula_usuarios"];
			$_nombre_usuarios     = $_POST["nombre_usuarios"];
			//$_usuario_usuario     = $_POST["usuario_usuario"];
			$_clave_usuarios      = $usuarios->encriptar($_POST["clave_usuarios"]);
			$_pass_sistemas_usuarios      = $_POST["clave_usuarios"];
			$_telefono_usuarios   = $_POST["telefono_usuarios"];
			$_celular_usuarios    = $_POST["celular_usuarios"];
			$_correo_usuarios     = $_POST["correo_usuarios"];
		    $_id_rol             = $_POST["id_rol"];
		    $_id_estado          = $_POST["id_estado"];
		    
		    $_id_usuarios          = $_POST["id_usuarios"];
		    
		    
		    if($_id_usuarios > 0){
		    	
		    	
		    	if ($_FILES['fotografia_usuarios']['tmp_name']!="")
		    	{
		    			
		    		$directorio = $_SERVER['DOCUMENT_ROOT'].'/webcapremci/fotografias_usuarios/';
		    			
		    		$nombre = $_FILES['fotografia_usuarios']['name'];
		    		$tipo = $_FILES['fotografia_usuarios']['type'];
		    		$tamano = $_FILES['fotografia_usuarios']['size'];
		    			
		    		move_uploaded_file($_FILES['fotografia_usuarios']['tmp_name'],$directorio.$nombre);
		    		$data = file_get_contents($directorio.$nombre);
		    		$imagen_usuarios = pg_escape_bytea($data);
		    			
		    			
		    		$colval = "cedula_usuarios= '$_cedula_usuarios', nombre_usuarios = '$_nombre_usuarios',  clave_usuarios = '$_clave_usuarios', pass_sistemas_usuarios='$_pass_sistemas_usuarios',  telefono_usuarios = '$_telefono_usuarios', celular_usuarios = '$_celular_usuarios', correo_usuarios = '$_correo_usuarios', id_rol = '$_id_rol', id_estado = '$_id_estado', fotografia_usuarios ='$imagen_usuarios'";
		    		$tabla = "usuarios";
		    		$where = "id_usuarios = '$_id_usuarios'";
		    		$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
		    			
		    	}
		    	else
		    	{
		    	
		    		$colval = "cedula_usuarios= '$_cedula_usuarios', nombre_usuarios = '$_nombre_usuarios',  clave_usuarios = '$_clave_usuarios', pass_sistemas_usuarios='$_pass_sistemas_usuarios',  telefono_usuarios = '$_telefono_usuarios', celular_usuarios = '$_celular_usuarios', correo_usuarios = '$_correo_usuarios', id_rol = '$_id_rol', id_estado = '$_id_estado'";
		    		$tabla = "usuarios";
		    		$where = "id_usuarios = '$_id_usuarios'";
		    		$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
		    	
		    	}
		    	
		    	
		    	
		    }else{
		    
		    	
		    	
		    	
		    if ($_FILES['fotografia_usuarios']['tmp_name']!="")
		    {
		    
		    	$directorio = $_SERVER['DOCUMENT_ROOT'].'/webcapremci/fotografias_usuarios/';
		    
		    	$nombre = $_FILES['fotografia_usuarios']['name'];
		    	$tipo = $_FILES['fotografia_usuarios']['type'];
		    	$tamano = $_FILES['fotografia_usuarios']['size'];
		    	
		    	move_uploaded_file($_FILES['fotografia_usuarios']['tmp_name'],$directorio.$nombre);
		    	$data = file_get_contents($directorio.$nombre);
		    	$imagen_usuarios = pg_escape_bytea($data);
		    
		    
		    	$funcion = "ins_usuarios";
		    	$parametros = "'$_cedula_usuarios',
		    				   '$_nombre_usuarios',
		    				   '$_clave_usuarios',
		    	               '$_pass_sistemas_usuarios',
		    	               '$_telefono_usuarios',
		    	               '$_celular_usuarios',
		    	               '$_correo_usuarios',
		    	               '$_id_rol',
		    	               '$_id_estado',
		    	               '$imagen_usuarios'";
		    	$usuarios->setFuncion($funcion);
		    	$usuarios->setParametros($parametros);
		    	$resultado=$usuarios->Insert();
		    
		    }
		    else
		    {
		    
		    	$where_TO = "cedula_usuarios = '$_cedula_usuarios'";
		    	$result=$usuarios->getBy($where_TO);
		    	 
		    	if ( !empty($result) )
		    	{
		    		 
		    		$colval = "nombre_usuarios = '$_nombre_usuarios',  clave_usuarios = '$_clave_usuarios', pass_sistemas_usuarios='$_pass_sistemas_usuarios',  telefono_usuarios = '$_telefono_usuarios', celular_usuarios = '$_celular_usuarios', correo_usuarios = '$_correo_usuarios', id_rol = '$_id_rol', id_estado = '$_id_estado'";
		    		$tabla = "usuarios";
		    		$where = "cedula_usuarios = '$_cedula_usuarios'";
		    		$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
		    	}
		        else{
		        	
		        	$imagen_usuarios="";
		        	
		        	$funcion = "ins_usuarios";
		        	$parametros = "'$_cedula_usuarios',
		        	'$_nombre_usuarios',
		        	'$_clave_usuarios',
		        	'$_pass_sistemas_usuarios',
		        	'$_telefono_usuarios',
		        	'$_celular_usuarios',
		        	'$_correo_usuarios',
		        	'$_id_rol',
		        	'$_id_estado',
		        	'$imagen_usuarios'";
		        	$usuarios->setFuncion($funcion);
		        	$usuarios->setParametros($parametros);
		        	$resultado=$usuarios->Insert();
		    	}
		    
		    }
		  }
		  
		  
		  
		  
		 
		  
		  
		  
		  
		  
		    $this->redirect("Usuarios", "index");
		}
		
	   }else{
	   	
	   	$error = TRUE;
	   	$mensaje = "Te sesión a caducado, vuelve a iniciar sesión.";
	   		
	   	$this->view("Login",array(
	   			"resultSet"=>"$mensaje", "error"=>$error
	   	));
	   		
	   		
	   	die();
	   	
	   }
	}
	
	public function borrarId()
	{
		if(isset($_GET["id_usuarios"]))
		{
			$id_usuario=(int)$_GET["id_usuarios"];
	
			$usuarios=new UsuariosModel();
				
			$sesiones= new SesionesModel();
			$sesiones->deleteBy(" id_usuarios",$id_usuario);
			$usuarios->deleteBy(" id_usuarios",$id_usuario);
				
				
		}
	
		$this->redirect("Usuarios", "index");
	}
	
	
	public function resetear_clave()
	{

		session_start();
		$_usuario_usuario = "";
		$_clave_usuario = "";
		$usuarios = new UsuariosModel();
		$error = FALSE;
		
		
		$mensaje = "";
		
		if (isset($_POST['cedula_usuarios']))
		{
			$_cedula_usuarios = $_POST['cedula_usuarios'];
		
			$where = "cedula_usuarios = '$_cedula_usuarios'   ";
			$resultUsu = $usuarios->getBy($where);
			
			if(!empty($resultUsu))
			{
				foreach ($resultUsu as $res){
					
					$correo_usuario=$res->correo_usuarios;
				}
				
				
				$cadena = "1234567890";
				$longitudCadena=strlen($cadena);
				$pass = "";
				$longitudPass=4;
				for($i=1 ; $i<=$longitudPass ; $i++){
					$pos=rand(0,$longitudCadena-1);
					$pass .= substr($cadena,$pos,1);
				}
				$_clave_usuario= $pass;
				$_encryp_pass = $usuarios->encriptar($_clave_usuario);
				$usuarios->UpdateBy("clave_usuarios = '$_encryp_pass', pass_sistemas_usuarios='$_clave_usuario'", "usuarios", "cedula_usuarios = '$_cedula_usuarios'  ");
					
			}
				
			if ($_clave_usuario == "")
			{
				$mensaje = "Este Usuario no existe resgistrado en nuestro sistema.";
		
				$error = TRUE;
		
			}
			else
			{
		
				$cabeceras = "MIME-Version: 1.0 \r\n";
				$cabeceras .= "Content-type: text/html; charset=utf-8 \r\n";
				$cabeceras.= "From: info@capremci.com.ec \r\n";
				$destino="$correo_usuario";
				$asunto="Claves de Acceso Capremci";
				$fecha=date("d/m/y");
				$hora=date("H:i:s");
		
				
				$resumen="
				<table rules='all'>
				<tr><td WIDTH='1000' HEIGHT='50'><center><img src='http://186.4.157.125:80/webcapremci/view/images/bcaprem.png' WIDTH='300' HEIGHT='120'/></center></td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='center'><b> BIENVENIDO A CAPREMCI </b></td></tr></p>
				<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='justify'>Somos un Fondo Previsional orientado a asegurar el futuro de sus partícipes, prestando servicios complementarios para satisfacer sus necesidades; con infraestructura tecnológica – operativa de vanguardia y talento humano competitivo.</td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background: #FFFFFF'><td WIDTH='1000' align='center'><b> TUS DATOS DE ACCESO SON: </b></td></tr>
				<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Usuario:</b> $_cedula_usuarios</td></tr>
				<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Clave Temporal:</b> $_clave_usuario </td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background:#1C1C1C'><td WIDTH='1000' HEIGHT='50' align='center'><font color='white'>Capremci - <a href='http://www.capremci.com.ec'><FONT COLOR='#7acb5a'>www.capremci.com.ec</FONT></a> - Copyright © 2018-</font></td></tr>
				</table>
				";
		
				
		
				if(mail("$destino","Claves de Acceso Capremci","$resumen","$cabeceras"))
				{
					$mensaje = "Te hemos enviado un correo electrónico con tus datos de acceso.";
					
		
				}else{
					$mensaje = "No se pudo enviar el correo con la informacion. Intentelo nuevamente.";
					$error = TRUE;
		
				}
					
			}
				
		}
		
		$this->view("ResetUsuarios",array(
				"resultSet"=>$mensaje , "error"=>$error
		));
		
	}
	
	
	
	public function resetear_password()
	{
		session_start();
		$_usuario_usuario = "";
		$_clave_usuario = "";
		$usuarios = new UsuariosModel();
		$error = FALSE;
	
	
		$mensaje = "";
	
		if (isset($_POST['cedula_usuarios']))
		{
			$_cedula_usuarios = $_POST['cedula_usuarios'];
	
			$where = "cedula_usuarios = '$_cedula_usuarios'   ";
			$resultUsu = $usuarios->getBy($where);
	
			if(!empty($resultUsu))
			{
	
				foreach ($resultUsu as $res){
	
					$correo_usuario=$res->correo_usuarios;
					$id_estado=$res->id_estado;
					$nombre_usuario   = $res->nombre_usuarios;
					$_clave_usuario= $res->pass_sistemas_usuarios;
				}
	
	
				
					
			}
	
			if ($_clave_usuario == "")
			{
				$mensaje = "Este Usuario no existe resgistrado en nuestro sistema.";
	
				$error = TRUE;
	
	
			}
			else
			{
	
	
				if($id_estado==1 || $id_estado==2 ){
	
						
						
					$cabeceras = "MIME-Version: 1.0 \r\n";
					$cabeceras .= "Content-type: text/html; charset=utf-8 \r\n";
					$cabeceras.= "From: info@capremci.com.ec \r\n";
					$destino="$correo_usuario";
					$asunto="Claves de Acceso Capremci";
					$fecha=date("d/m/y");
					$hora=date("H:i:s");
	
	
					$resumen="
					<table rules='all'>
					<tr><td WIDTH='1000' HEIGHT='50'><center><img src='http://186.4.157.125:80/webcapremci/view/images/bcaprem.png' WIDTH='300' HEIGHT='120'/></center></td></tr>
					</tabla>
					<p><table rules='all'></p>
					<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='center'><b> BIENVENIDO A CAPREMCI </b></td></tr></p>
					<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='justify'>Somos un Fondo Previsional orientado a asegurar el futuro de sus partícipes, prestando servicios complementarios para satisfacer sus necesidades; con infraestructura tecnológica – operativa de vanguardia y talento humano competitivo.</td></tr>
					</tabla>
					<p><table rules='all'></p>
					<tr style='background: #FFFFFF'><td WIDTH='1000' align='center'><b> TUS DATOS DE ACCESO SON: </b></td></tr>
					<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Usuario:</b> $_cedula_usuarios</td></tr>
					<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Clave Temporal:</b> $_clave_usuario </td></tr>
					</tabla>
					<p><table rules='all'></p>
					<tr style='background:#1C1C1C'><td WIDTH='1000' HEIGHT='50' align='center'><font color='white'>Capremci - <a href='http://www.capremci.com.ec'><FONT COLOR='#7acb5a'>www.capremci.com.ec</FONT></a> - Copyright © 2018-</font></td></tr>
					</table>
					";
	
	
					if(mail("$destino","Claves de Acceso Capremci","$resumen","$cabeceras"))
					{
						$mensaje = "Te hemos enviado un correo electrónico a $correo_usuario con tus datos de acceso.";
	
	
					}else{
						$mensaje = "No se pudo enviar el correo con la informacion. Intentelo nuevamente.";
						$error = TRUE;
	
					}
						
	
				}else{
						
						
					$error = TRUE;
					$mensaje = "Hola $nombre_usuario tu usuario se encuentra inactivo.";
	
	
					$this->view("Login",array(
							"resultSet"=>"$mensaje", "error"=>$error
					));
	
	
					die();
						
						
						
				}
					
					
					
					
			}
	
			$this->view("Login",array(
					"resultSet"=>"$mensaje", "error"=>$error
			));
	
	
			die();
				
		}else{
				
			$mensaje = "Ingresa tu cedula para recuperar tu clave.";
			$error = TRUE;
		}
	
	
	
		$this->view("ResetUsuariosInicio",array(
				"resultSet"=>$mensaje , "error"=>$error
		));
	
	}
	
	
	
	public function resetear_clave_inicio()
	{
		session_start();
		$_usuario_usuario = "";
		$_clave_usuario = "";
		$usuarios = new UsuariosModel();
		$error = FALSE;
	
	
		$mensaje = "";
	
		if (isset($_POST['cedula_usuarios']))
		{
			$_cedula_usuarios = $_POST['cedula_usuarios'];
	
			$where = "cedula_usuarios = '$_cedula_usuarios'   ";
			$resultUsu = $usuarios->getBy($where);
				
			if(!empty($resultUsu))
			{
	
				foreach ($resultUsu as $res){
						
					$correo_usuario=$res->correo_usuarios;
					$id_estado=$res->id_estado;
					$nombre_usuario   = $res->nombre_usuarios;
				}
	
	
				$cadena = "1234567890";
				$longitudCadena=strlen($cadena);
				$pass = "";
				$longitudPass=4;
				for($i=1 ; $i<=$longitudPass ; $i++){
					$pos=rand(0,$longitudCadena-1);
					$pass .= substr($cadena,$pos,1);
				}
				$_clave_usuario= $pass;
				$_encryp_pass = $usuarios->encriptar($_clave_usuario);
					
			}
	
			if ($_clave_usuario == "")
			{
				$mensaje = "Este Usuario no existe resgistrado en nuestro sistema.";
	
				$error = TRUE;
	
	
			}
			else
			{
	
				
				if($id_estado==1 || $id_estado==2 ){
				
				$usuarios->UpdateBy("clave_usuarios = '$_encryp_pass', pass_sistemas_usuarios='$_clave_usuario'", "usuarios", "cedula_usuarios = '$_cedula_usuarios'  ");
					
					
				$cabeceras = "MIME-Version: 1.0 \r\n";
				$cabeceras .= "Content-type: text/html; charset=utf-8 \r\n";
				$cabeceras.= "From: info@capremci.com.ec \r\n";
				$destino="$correo_usuario";
				$asunto="Claves de Acceso Capremci";
				$fecha=date("d/m/y");
				$hora=date("H:i:s");
	
	
				$resumen="
				<table rules='all'>
				<tr><td WIDTH='1000' HEIGHT='50'><center><img src='http://186.4.157.125:80/webcapremci/view/images/bcaprem.png' WIDTH='300' HEIGHT='120'/></center></td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='center'><b> BIENVENIDO A CAPREMCI </b></td></tr></p>
				<tr style='background: #FFFFFF;'><td  WIDTH='1000' align='justify'>Somos un Fondo Previsional orientado a asegurar el futuro de sus partícipes, prestando servicios complementarios para satisfacer sus necesidades; con infraestructura tecnológica – operativa de vanguardia y talento humano competitivo.</td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background: #FFFFFF'><td WIDTH='1000' align='center'><b> TUS DATOS DE ACCESO SON: </b></td></tr>
				<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Usuario:</b> $_cedula_usuarios</td></tr>
				<tr style='background: #FFFFFF;'><td WIDTH='1000' > <b>Clave Temporal:</b> $_clave_usuario </td></tr>
				</tabla>
				<p><table rules='all'></p>
				<tr style='background:#1C1C1C'><td WIDTH='1000' HEIGHT='50' align='center'><font color='white'>Capremci - <a href='http://www.capremci.com.ec'><FONT COLOR='#7acb5a'>www.capremci.com.ec</FONT></a> - Copyright © 2018-</font></td></tr>
				</table>
				";
	
	
				if(mail("$destino","Claves de Acceso Capremci","$resumen","$cabeceras"))
				{
					$mensaje = "Te hemos enviado un correo electrónico a $correo_usuario con tus datos de acceso.";
						
	
				}else{
					$mensaje = "No se pudo enviar el correo con la informacion. Intentelo nuevamente.";
					$error = TRUE;
	
				}
			
				
				}else{
					
					
					$error = TRUE;
					$mensaje = "Hola $nombre_usuario tu usuario se encuentra inactivo.";
						
						
					$this->view("Login",array(
							"resultSet"=>"$mensaje", "error"=>$error
					));
						
						
					die();
					
					
					
				}
			
			
			
			
			}
			 
			$this->view("Login",array(
					"resultSet"=>"$mensaje", "error"=>$error
			));
			 
			 
			die();
			
		}else{
			
			$mensaje = "Ingresa tu cedula para recuperar tu clave.";
			$error = TRUE;
		}
	
	
	
		$this->view("ResetUsuariosInicio",array(
				"resultSet"=>$mensaje , "error"=>$error
		));
	
	}
	
	public function Inicio(){
	
		session_start();
		
		$this->view("Login",array(
				"allusers"=>""
		));
	}
    
    
    public function Login(){
    
    	session_destroy();
    	$usuarios=new UsuariosModel();
    
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	 
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Login",array(
    			"allusers"=>$allusers
    	));
    }
    public function Bienvenida(){
    
    	session_start();
    	
    	if(isset($_SESSION['id_usuarios']))
    	{
    		$_usuario=$_SESSION['nombre_usuarios'];
    		$_id_rol=$_SESSION['id_rol'];
    		
    		if($_id_rol==1 || $_id_rol==42 || $_id_rol==43 || $_id_rol==44 || $_id_rol==45){
    				
    		
    			$this->view("BienvenidaAdmin",array(
    					"allusers"=>$_usuario
    			));
    				
    			die();
    				
    		}else{
    				
    			$this->view("Bienvenida",array(
    					"allusers"=>$_usuario
    			));
    		
    			die();
    				
    		}
    		
    		 
    	}else{
    	
    	$error = TRUE;
	   	$mensaje = "Te sesión a caducado, vuelve a iniciar sesión.";
	   		
	   	$this->view("Login",array(
	   			"resultSet"=>"$mensaje", "error"=>$error
	   	));
	   		
	   		
	   	die();
    	}
    }
    
	
	
    
	
    
    public function Loguear(){
    	
    	
    	$error=FALSE;
    	
    
    	
    	if (isset($_POST["usuario"]) && ($_POST["clave"] ) )
    	{
    	
    		
    		$usuarios=new UsuariosModel();
    		$_usuario = $_POST["usuario"];
    		$_clave =   $usuarios->encriptar($_POST["clave"]);
    		
    		 
    		
    		$where = "cedula_usuarios = '$_usuario' AND  clave_usuarios ='$_clave'";
    	
    		$result=$usuarios->getBy($where);

    		$usuario_usuario = "";
    		$id_rol  = "";
    		$nombre_usuario = "";
    		$correo_usuario = "";
    		$ip_usuario = "";
    		
    		if ( !empty($result) )
    		{ 
    			foreach($result as $res) 
    			{
    				$id_usuario  = $res->id_usuarios;
    			    $usuario_usuario  = $res->usuario_usuario;
	    			$id_rol           = $res->id_rol;
	    			$nombre_usuario   = $res->nombre_usuarios;
	    			$correo_usuario   = $res->correo_usuarios;
	    			$id_estado        = $res->id_estado;
	    			$cedula_usuarios        = $res->cedula_usuarios;
	    			
    			}	
    			
    			if($id_estado==1 || $id_estado==2 || $id_estado==3 ){
    				
    				
    				//obtengo ip
    				$ip_usuario = $usuarios->getRealIP();
    				 
    				 
    				///registro sesion
    				$usuarios->registrarSesion($id_usuario, $usuario_usuario, $id_rol, $nombre_usuario, $correo_usuario, $ip_usuario, $cedula_usuarios);
    				 
    				//inserto en la tabla
    				$_id_usuario = $_SESSION['id_usuarios'];
    				 
    				$sesiones = new SesionesModel();
    				
    				$funcion = "ins_sesiones";
    				 
    				$parametros = " '$_id_usuario' ,'$ip_usuario' ";
    				$sesiones->setFuncion($funcion);
    				
    				$_id_rol=$_SESSION['id_rol'];
    				$usuarios->MenuDinamico($_id_rol);
    				 
    				$sesiones->setParametros($parametros);
    				 
    				 
    				$resultado=$sesiones->Insert();
    				 
    				 
    				
    				if($_id_rol==1 || $_id_rol==42 || $_id_rol==43 || $_id_rol==44 || $_id_rol==45){
    					

    					$this->view("BienvenidaAdmin",array(
    							"allusers"=>$_usuario
    					));
    					
    					die();
    					
    				}else{
    					
    				   
    				   
    				    
    				    
    					$this->view("Bienvenida",array(
    							"allusers"=>$_usuario
    					));
    						
    					die();
    					
    				}
    				
    				
    			}else{
    				
    				
    				$error = TRUE;
    				$mensaje = "Hola $nombre_usuario tu usuario se encuentra inactivo.";
    				 
    				 
    				$this->view("Login",array(
    						"resultSet"=>"$mensaje", "error"=>$error
    				));
    				 
    				 
    				die();
    			}
    			
    			
    		}
    		else
    		{
    			$error = TRUE;
    			$mensaje = "Este Usuario no existe resgistrado en nuestro sistema.";
    			
    			
	    		$this->view("Login",array(
	    				"resultSet"=>"$mensaje", "error"=>$error
	    		));
	    		
	    		
	    		die();
    		}
    		
    	} 
    	else
    	{
    		    $error = TRUE;
    			$mensaje = "Ingrese su cedula y su clave.";
    			
    			
	    		$this->view("Login",array(
	    				"resultSet"=>"$mensaje", "error"=>$error
	    		));
	    		
	    		
	    		die();
    		
    	}
    	
    
    	
    }

    
   
    
    
    public function  sesion_caducada()
    {
    	session_start();
    	session_destroy();
    
    	$error = TRUE;
	    $mensaje = "Te sesión a caducado, vuelve a iniciar sesión.";
	    	
	    $this->view("Login",array(
	    		"resultSet"=>"$mensaje", "error"=>$error
	    ));
	    	
	    die();
	    		
    
    }
    
    
	public function  cerrar_sesion ()
	{
		session_start();
		session_destroy();
		
		$error = TRUE;
		$mensaje = "Te has desconectado de nuestro sistema.";
		 
		 
		$this->view("Login",array(
				"resultSet"=>"$mensaje", "error"=>$error
		));
		 
		 
		die();
		
		
	}
	
	
	
	public function  actualizo_perfil ()
	{
		session_start();
		session_destroy();
	
		$error = FALSE;
		$mensaje = "Actualizaste tus datos, vuelve a iniciar sesión.";	
			
		$this->view("Login",array(
				"resultSet"=>"$mensaje", "error"=>$error
		));
			
			
		die();
	
	
	}
	
	
	public function Actualiza ()
	{
		session_start();
		
		$rol=new RolesModel();
		$resultRol = $rol->getAll("nombre_rol");
			
		$estado = new EstadoModel();
		$resultEst = $estado->getAll("nombre_estado");
			
		
		if (isset(  $_SESSION['nombre_usuarios']) )
		{
			
			$usuarios = new UsuariosModel();
		
						
					
				$resultEdit = "";
					
				$_id_usuario = $_SESSION['id_usuarios'];
				
				$columnas = " usuarios.id_usuarios,
								  usuarios.cedula_usuarios,
								  usuarios.nombre_usuarios,
								  usuarios.clave_usuarios,
								  usuarios.pass_sistemas_usuarios,
								  usuarios.telefono_usuarios,
								  usuarios.celular_usuarios,
								  usuarios.correo_usuarios,
								  rol.id_rol,
								  rol.nombre_rol,
								  estado.id_estado,
								  estado.nombre_estado,
								  usuarios.fotografia_usuarios,
								  usuarios.creado";
					
					
				$tablas   = "public.usuarios,
								  public.rol,
								  public.estado";
					
				$where    = " rol.id_rol = usuarios.id_rol AND
								  estado.id_estado = usuarios.id_estado AND usuarios.id_usuarios = '$_id_usuario'";
					
				$id       = "usuarios.id_usuarios";
				
				$resultEdit=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
					
				
				

				if ( isset($_POST["cedula_usuarios"]) )
				{
					
					$_cedula_usuarios    = $_POST["cedula_usuarios"];
					$_nombre_usuarios     = $_POST["nombre_usuarios"];
					//$_usuario_usuario     = $_POST["usuario_usuario"];
					$_clave_usuarios      = $usuarios->encriptar($_POST["clave_usuarios"]);
					$_pass_sistemas_usuarios      = $_POST["clave_usuarios"];
					$_telefono_usuarios   = $_POST["telefono_usuarios"];
					$_celular_usuarios    = $_POST["celular_usuarios"];
					$_correo_usuarios     = $_POST["correo_usuarios"];
					$_id_rol             = $_POST["id_rol"];
					$_id_estado          = $_POST["id_estado"];
					
					$_id_usuario = $_SESSION['id_usuarios'];
					
					if ($_FILES['fotografia_usuarios']['tmp_name']!="")
					{
					
						$directorio = $_SERVER['DOCUMENT_ROOT'].'/webcapremci/fotografias_usuarios/';
					
						$nombre = $_FILES['fotografia_usuarios']['name'];
						$tipo = $_FILES['fotografia_usuarios']['type'];
						$tamano = $_FILES['fotografia_usuarios']['size'];
						 
						move_uploaded_file($_FILES['fotografia_usuarios']['tmp_name'],$directorio.$nombre);
						$data = file_get_contents($directorio.$nombre);
						$imagen_usuarios = pg_escape_bytea($data);
					
					
						    $colval = "cedula_usuarios= '$_cedula_usuarios', nombre_usuarios = '$_nombre_usuarios',  clave_usuarios = '$_clave_usuarios', pass_sistemas_usuarios='$_pass_sistemas_usuarios',  telefono_usuarios = '$_telefono_usuarios', celular_usuarios = '$_celular_usuarios', correo_usuarios = '$_correo_usuarios', fotografia_usuarios ='$imagen_usuarios'";
							$tabla = "usuarios";
							$where = "id_usuarios = '$_id_usuario'";
							$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
					
					}
					else
					{
						
						$colval = "cedula_usuarios= '$_cedula_usuarios', nombre_usuarios = '$_nombre_usuarios',  clave_usuarios = '$_clave_usuarios', pass_sistemas_usuarios='$_pass_sistemas_usuarios',  telefono_usuarios = '$_telefono_usuarios', celular_usuarios = '$_celular_usuarios', correo_usuarios = '$_correo_usuarios'";
						$tabla = "usuarios";
						$where = "id_usuarios = '$_id_usuario'";
						$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
						
					}
					
					
					
					
					
					
					$this->redirect("Usuarios", "actualizo_perfil");
					 
					 
				}
				else
				{
					$this->view("ActualizarUsuarios",array(
							"resultEdit" =>$resultEdit, "resultRol"=>$resultRol, "resultEst"=>$resultEst
								
					));
					
				}
				

		}
		else{
       	
       	$this->redirect("Usuarios","sesion_caducada");
       	
       }
		
	}
	
	
	
	
	
	////// lo nuevo
	
	public function contar_roles(){
	
		session_start();
		$id_rol=$_SESSION["id_rol"];
		$i=0;
		$roles=new RolesModel();
		$columnas = " id_rol";
		$tablas   = "rol";
		$where    = "id_rol >0 ";
		$id       = "id_rol";
			
		$resultSet = $roles->getCondiciones($columnas ,$tablas ,$where, $id);
			
	
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-12'>";
			$html .= "<div class='small-box bg-yellow'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Roles Registrados.</p>";
			$html .= "</div>";
	
	
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-calendar'></i>";
			$html .= "</div>";
			if($id_rol==1){
				
				$html .= "<a href='index.php?controller=Roles&action=index' class='small-box-footer'>Operaciones con Roles <i class='fa fa-arrow-circle-right'></i></a>";
					
			}else{
				$html .= "<a href='#' class='small-box-footer'>Operaciones con Roles <i class='fa fa-arrow-circle-right'></i></a>";
				
			}
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
	
			$html = "<b>Actualmente no hay permisos registrados...</b>";
		}
	
		echo $html;
		die();
	
	
	}
	
	
	public function cargar_permisos_roles(){
	
		session_start();
		$id_rol=$_SESSION["id_rol"];
		$i=0;
		$permisos_rol = new PermisosRolesModel();
		$columnas = "permisos_rol.id_permisos_rol";
		$tablas   = "public.controladores,  public.permisos_rol, public.rol";
		$where    = " controladores.id_controladores = permisos_rol.id_controladores AND permisos_rol.id_rol = rol.id_rol";
		$id       = " permisos_rol.id_permisos_rol";
		$resultSet = $permisos_rol->getCondiciones($columnas ,$tablas ,$where, $id);
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-12'>";
			$html .= "<div class='small-box bg-red'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Permisos Registrados.</p>";
			$html .= "</div>";
	
	
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-stats-bars'></i>";
			$html .= "</div>";
			if($id_rol==1){
				$html .= "<a href='index.php?controller=PermisosRoles&action=index' class='small-box-footer'>Operaciones con permisos <i class='fa fa-arrow-circle-right'></i></a>";
			}else{
				$html .= "<a href='#' class='small-box-footer'>Operaciones con permisos <i class='fa fa-arrow-circle-right'></i></a>";
			}
		
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
	
			$html = "<b>Actualmente no hay permisos registrados...</b>";
		}
	
		echo $html;
		die();
	
	
	}
	
	
	
	public function cargar_sesiones(){
	
		session_start();
		$id_rol=$_SESSION["id_rol"];
		$i=0;
	    $usuarios = new UsuariosModel();
	    $columnas = "sesiones.id_sesiones";
	    $tablas   = "public.sesiones, public.usuarios";
	    $where    = "sesiones.id_usuarios = usuarios.id_usuarios";
	    $id       = "usuarios.nombre_usuarios";
	    $resultSet = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-12'>";
			$html .= "<div class='small-box bg-aqua'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Sesiones Registradas.</p>";
			$html .= "</div>";
	
	
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-stats-bars'></i>";
			$html .= "</div>";
			if($id_rol==1){
			$html .= "<a href='index.php?controller=Sesiones&action=index' class='small-box-footer'>Leer Mas<i class='fa fa-arrow-circle-right'></i></a>";
			}else{
				$html .= "<a href='#' class='small-box-footer'>Leer Mas<i class='fa fa-arrow-circle-right'></i></a>";
			
					
				
			}
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
	
			$html = "<b>Actualmente no hay sesiones registrados...</b>";
		}
	
		echo $html;
		die();
	
	
	}
	
	
	
	
	
	
	
	
	
	
	public function paginate($reload, $page, $tpages, $adjacents) {
	
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = '<ul class="pagination pagination-large">';
	
		// previous label
	
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_usuarios(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_usuarios(".($page-1).")'>$prevlabel</a></span></li>";
	
		}
	
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_usuarios(1)'>1</a></li>";
		}
		// interval
		if($page>($adjacents+2)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// pages
	
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='active'><a>$i</a></li>";
			}else if($i==1) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_usuarios(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load_usuarios(".$i.")'>$i</a></li>";
			}
		}
	
		// interval
	
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// last
	
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_usuarios($tpages)'>$tpages</a></li>";
		}
	
		// next
	
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_usuarios(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
	
		$out.= "</ul>";
		return $out;
	}
	
	
	
	///////////////////////////////////////////////// informacion de participes ///////
	
	
	
	public function alerta_actualizacion(){
	
		session_start();
		$i=0;
		$usuarios = new UsuariosModel();
	
		
	
		$cedula_usuarios = $_SESSION["cedula_usuarios"];
	
		if(!empty($cedula_usuarios)){
			
			$columnas = "usuarios.id_usuarios, usuarios.cedula_usuarios, usuarios.nombre_usuarios, usuarios.correo_usuarios";
			 
			$tablas   = "public.usuarios";
			 
			$where    = " 1=1 AND usuarios.cedula_usuarios='$cedula_usuarios'";
			 
			$id       = "usuarios.id_usuarios";
			
			
			
			$resultSet = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
	
			$i=count($resultSet);
				
			$html="";
			if($i>0)
			{
				if (!empty($resultSet)) {
					$_id_usuarios=$resultSet[0]->id_usuarios;
					$_cedula_usuarios=$resultSet[0]->cedula_usuarios;
					$_nombre_usuarios=$resultSet[0]->nombre_usuarios;
					$_correo_usuarios=$resultSet[0]->correo_usuarios;
					
						
				}
	

				$html .= "<div class='col-md-4 col-sm-6 col-xs-12'>";
				$html .= "<div class='info-box'>";
				$html .= "<span class='info-box-icon bg-aqua'><img src='view/DevuelveImagenView.php?id_valor=$_id_usuarios&id_nombre=id_usuarios&tabla=usuarios&campo=fotografia_usuarios' width='80' height='80'></span>";
				$html .= "<div class='info-box-content'>";
				$html .= "<span class='info-box-text'>Hola <strong>$_nombre_usuarios</strong><br> ayudanos actualizando tu información<br> personal.</span>";
				$html .= "</div>";
				$html .= "</div>";
				$html .= "</div>";
	
	
			}else{
	

				$html .= "<div class='col-md-4 col-sm-6 col-xs-12'>";
				$html .= "<div class='info-box'>";
				$html .= "<span class='info-box-icon bg-aqua'><i class='ion ion-person-add'></i></span>";
				$html .= "<div class='info-box-content'>";
				$html .= "<span class='info-box-text'>Debes iniciar sesión.</span>";
				$html .= "</div>";
				$html .= "</div>";
				$html .= "</div>";
					
			}
	
			echo $html;
			die();
	
		}
		else{
	
	
	
			$this->redirect("Usuarios","sesion_caducada");
	
			die();
	
		}
	
	}
	
	
	
	
	////////////////////////////////////////REPORTES /////////////////////////////////////////////////////////////
	
	
	
	
	///////////////////////////////////////////////////// DESCARGA DE DOCUMENTOS/////////////////////////////
	
	
	
	
	
	
	
	
	public function inicializar(){
		
		session_start();				
		$this->view("Documentos",array(
					"resultSet"=>""
	
		));
	
	
	}
	
	
}
?>
