
<?php


class ChatController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}


	public function index(){
	
	    
	    session_start();
	    if (isset(  $_SESSION['nombre_usuarios']) )
	    {
	     
	        
	        $usuarios = new UsuariosModel();
	        
	        $nombre_controladores = "Chat";
	        $id_rol= $_SESSION['id_rol'];
	        $resultPer = $usuarios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
	        
	        if (!empty($resultPer))
	        {
	            
	            
	            $this->view("Chat",array(
	                ""=>""
	            ));
	        }
	        else
	        {
	            $this->view("Error",array(
	                "resultado"=>"No tiene Permisos de Acceso a Chat"
	                
	            ));
	            
	        }
	        
	        
	    }
	    else{
	        
	        $this->redirect("Usuarios","sesion_caducada");
	        
	    }
				
			
			
		
	
	}
	
	
	
	
	
	public function IniciarChat(){
	    
	    session_start();
	   
	    $usuarios_chat= new Usuarios_ChatModel();
	    $mensajes_chat= new Mensajes_ChatModel();
	   
	    
	    $nombre=(isset($_POST['nombre'])) ? $_POST['nombre']:'';
	    $email=(isset($_POST['email'])) ? $_POST['email']:'';
	    $numero_celular=(isset($_POST['numero_celular'])) ? $_POST['numero_celular']:'';
	    
	    
	    if(!empty($nombre) && !empty($email)){
	        
	        $funcion = "ins_usuarios_chat";
	        $parametros = "
                    '$nombre',
                    '$email',
                    '$numero_celular'";
	        
	        $usuarios_chat->setFuncion($funcion);
	        $usuarios_chat->setParametros($parametros);
	        
	        $resultado = $usuarios_chat->llamafuncionPG();
	        
	        
	        if((int)($resultado[0]) == 0 || is_null($resultado)){
	            
	            echo json_encode(array('error'=>"Error Iniciando Chat"));
	            exit();
	        }
	        else{
	            
	            $id = $resultado[0];
	            $_ip_usuario = $usuarios_chat->getRealIP();
	            $usuarios_chat->registrarSesionChat($id, $_ip_usuario, $nombre, $email, $numero_celular);
	            
	            
	            $funcion = "ins_mensajes_chat";
	            $parametros = "
                    '1',
                    '$id',
                    'Hola $nombre cuentanos en que te podemos ayudar.'";
	            $mensajes_chat->setFuncion($funcion);
	            $mensajes_chat->setParametros($parametros);
	            $resultado = $mensajes_chat->llamafuncionPG();
	            
	            
	            echo json_encode(array('id'=>$id, 'nombre_usuarios'=>$nombre,'mensaje'=>"Chat Iniciado Correctamente"));
	            exit();
	        }
	        
	        
	        
	    }
	    
	    
	}
	
	
	
	
	
	
	public  function CargarChats(){
	    
	    
	    session_start();
	    $mensajes_chat= new Mensajes_ChatModel();
	    
	    $html="";
	    
	    if(!isset($_SESSION['id_usuarios'])){
	        echo 'Session Caducada';
	        exit();
	    }
	    
	    if(!empty($_SESSION['id_usuarios'])){
	        
	        
	        $columnas="u.id_usuarios_chat, u.nombre_usuarios_chat, u.correo_usuarios_chat, u.celular_usuarios_chat,  ( select to_char(max(creado),'DD-MM-YYYY HH24:MI')
                       from mensajes_chat aa where aa.id_usuarios_chat_remitente = u.id_usuarios_chat) as fecha";
	        $tablas="usuarios_chat u
	        inner join mensajes_chat m on u.id_usuarios_chat=m.id_usuarios_chat_remitente";
	        $where="m.id_usuarios_chat_remitente not in (1)
                    group by u.id_usuarios_chat, u.nombre_usuarios_chat, u.correo_usuarios_chat, u.celular_usuarios_chat";
	        $id="fecha";
	        
	        
	        
	        $resulset=$mensajes_chat->getCondicionesDesc($columnas, $tablas, $where, $id);
	        
	        
	        
	        if(!empty($resulset)){
	            
	            foreach ($resulset as $res){
	                
	                
	                $_id_usuarios_chat = $res->id_usuarios_chat;
	                
	                $resultSetCan=$mensajes_chat->getCantidad("id_usuarios_chat_remitente", "mensajes_chat", "id_usuarios_chat_remitente='$_id_usuarios_chat' AND id_estado=1");
	                $cant=(int)$resultSetCan[0]->total;
	                
	                $html.='<li class="active"><a href="javascript:void(0);"  onclick="Cargar_Mensajes('.$_id_usuarios_chat.')"  ><i class="fa fa-inbox"></i> '.$res->nombre_usuarios_chat.'<span class="label label-warning pull-right">'.$cant.'</span></a></li>';
	                
	                
	                
	            }
	            
	            echo $html;
	            
	        }
	        
	        
	    }
	    
	    
	}
	
	
	
	
	
	
	
	public  function CargarMensajes(){
	    
	    
	    session_start();
	    $mensajes_chat= new Mensajes_ChatModel();
	    
	    $html="";
	    
	    if(!isset($_SESSION['id_usuarios'])){
	        echo 'Session Caducada';
	        exit();
	    }
	    
	    if(!empty($_SESSION['id_usuarios'])){
	        
	        $_id_usuarios_chat=$_POST["id_usuarios_chat_remitente"];
	        
	        $columnas="m.id_mensajes_chat, m.id_usuarios_chat_remitente,
                    (select u.nombre_usuarios_chat from usuarios_chat u where u.id_usuarios_chat=m.id_usuarios_chat_remitente) as nombre_usuarios_chat_remitente,
                    m.id_usuarios_chat_receptor,
                    (select u.nombre_usuarios_chat from usuarios_chat u where u.id_usuarios_chat=m.id_usuarios_chat_receptor) as nombre_usuarios_chat_receptor,
                    m.descripcion_mensajes_chat,
                    to_char(m.creado, 'DD-MM-YYYY HH24:MI') as fecha_mensajes_chat";
	        $tablas="mensajes_chat m";
	        $where="(m.id_usuarios_chat_remitente = 1
			AND m.id_usuarios_chat_receptor = $_id_usuarios_chat)
			OR (m.id_usuarios_chat_remitente = $_id_usuarios_chat
			AND m.id_usuarios_chat_receptor = 1)";
	        $id="m.creado";
	        
	        
	        
	        $resulset=$mensajes_chat->getCondiciones($columnas, $tablas, $where, $id);
	        
	        
	        
	        if(!empty($resulset)){
	            
	            foreach ($resulset as $res){
	                
	               
	                if($_id_usuarios_chat == $res->id_usuarios_chat_remitente){
	                // para el que envia
	                    
	                    $html.='<div class="direct-chat-msg right">';
	                    $html.='<div class="direct-chat-info clearfix">';
	                    $html.='<span class="direct-chat-name pull-right">'.$res->nombre_usuarios_chat_remitente.'</span>';
	                    $html.='<span class="direct-chat-timestamp pull-left">'.$res->fecha_mensajes_chat.'</span>';
	                    $html.='</div>';
	                    $html.='<img class="direct-chat-img" src="view/PAGINA_WEB/images/usuario.jpg" alt="message user image">';
	                    $html.='<div class="direct-chat-text">'.$res->descripcion_mensajes_chat.'</div>';
	                    $html.='</div>';
	                    
	                    
	                }else{
	                // para el que recibe    
	                    
	                    $html.='<div class="direct-chat-msg">';
	                    $html.='<div class="direct-chat-info clearfix">';
	                    $html.='<span class="direct-chat-name pull-left">'.$res->nombre_usuarios_chat_remitente.'</span>';
	                    $html.='<span class="direct-chat-timestamp pull-right">'.$res->fecha_mensajes_chat.'</span>';
	                    $html.='</div>';
	                    $html.='<img class="direct-chat-img" src="view/PAGINA_WEB/images/logo_chat.jpg" alt="message user image">';
	                    $html.='<div class="direct-chat-text">'.$res->descripcion_mensajes_chat.'</div>';
	                    $html.='</div>';
	                    
	                    
	                }
	                
	            }
	            
	            echo $html;
	            
	        }
	        
	        
	    }
	    
	    
	}
	
	
	
	public function verificar_sesion(){
	   
	    session_start();
	    $mensajes_chat= new Mensajes_ChatModel();
	    
	    if(!isset($_SESSION['id_usuarios_chat'])){
	       
	        echo json_encode(array('id'=>"0"));
	        exit();
	        
	    }else{
	        
	        $_id_usuarios_chat=$_SESSION['id_usuarios_chat'];
	        
	        echo json_encode(array('id'=>$_id_usuarios_chat));
	        exit();
	        
	    }
	        
	        
	  }
	    
	   
	  
	  public function EnviarMensaje(){
	      
	      session_start();
	      
	      if(!isset($_SESSION['id_usuarios'])){
	          echo 'Session Caducada';
	          exit();
	      }
	      
	      
	      $mensajes_chat= new Mensajes_ChatModel();
	      
	      
	      $nuevo_mensaje=(isset($_POST['nuevo_mensaje'])) ? $_POST['nuevo_mensaje']:'';
	      $_id_usuarios_chat_receptor=(isset($_POST['id_usuarios_chat_receptor'])) ? $_POST['id_usuarios_chat_receptor']:'';
	      
	      if(!empty($nuevo_mensaje) ){
	          
	         
	              
	              $funcion = "ins_mensajes_chat";
	              $parametros = "
                    '1',
                    '$_id_usuarios_chat_receptor',
                    '$nuevo_mensaje'";
	              $mensajes_chat->setFuncion($funcion);
	              $mensajes_chat->setParametros($parametros);
	              $resultado = $mensajes_chat->llamafuncionPG();
	              
	              
	              if((int)($resultado[0]) == 0 || is_null($resultado)){
	                  
	                  echo json_encode(array('error'=>"Error Enviando Mensaje"));
	                  exit();
	              }
	              else{
	                  
	                  $id = $resultado[0];
	              
	              
	              echo json_encode(array('id'=>$id));
	              exit();
	              
	              
	              }
	          }
	          
	      }
	      
	      
	
	      
	      public function ActualizarLeidos (){
	          
	          session_start();
	          
	          if(!isset($_SESSION['id_usuarios'])){
	              echo 'Session Caducada';
	              exit();
	          }
	          
	          
	          $mensajes_chat= new Mensajes_ChatModel();
	          
	          
	          $id_usuarios=(isset($_POST['id_usuarios'])) ? $_POST['id_usuarios']:'';
	          
	          if(!empty($id_usuarios) ){
	              
	              
	              
	              
	              $colval_afi = "id_estado=2";
	              $tabla_afi = "mensajes_chat";
	              $where_afi = "id_estado=1 AND id_usuarios_chat_remitente = '$id_usuarios'";
	              $resultado=$mensajes_chat->editBy($colval_afi, $tabla_afi, $where_afi);
	              
	              
	              
	              
	              if((int)$resultado > 0){
	                  
	                  $id = $resultado[0];
	                  
	                  
	                  echo json_encode(array('id'=>$id));
	                  exit();
	                  
	               
	                  
	                
	              }
	             
	          }
	          
	      }
	      
	      
	      
	
	      public function CerrarSesion(){
	          
	          session_start();
	          session_destroy();
	          
	          
	          echo json_encode(array('id'=>"0"));
	          exit();
	          
	          
	          
	         
	      }
	      
	      
	
}
?>