
<?php


class IniciarController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}


	public function index(){
	
		
				
				$this->view("PaginaWeb",array(
						""=>""
				));
			
		
	
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
	
	
	
	
	
	public  function CargarMensajes(){
	    
	    
	    session_start();
	    $mensajes_chat= new Mensajes_ChatModel();
	    
	    $html="";
	    
	    if(!isset($_SESSION['id_usuarios_chat'])){
	        echo 'Session Caducada';
	        exit();
	    }
	    
	    if(!empty($_SESSION['id_usuarios_chat'])){
	        
	        $_id_usuarios_chat=$_SESSION['id_usuarios_chat'];
	        
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
	      
	     
	      $mensajes_chat= new Mensajes_ChatModel();
	      
	      
	      $nuevo_mensaje=(isset($_POST['nuevo_mensaje'])) ? $_POST['nuevo_mensaje']:'';
	      $_id_usuarios_chat=$_SESSION['id_usuarios_chat'];
	      
	      if(!empty($nuevo_mensaje) ){
	          
	         
	              
	              $funcion = "ins_mensajes_chat";
	              $parametros = "
                    '$_id_usuarios_chat',
                    '1',
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
	      
	      
	
	
	      public function CerrarSesion(){
	          
	          session_start();
	          session_destroy();
	          
	          
	          echo json_encode(array('id'=>"0"));
	          exit();
	          
	          
	          
	         
	      }
	      
	      
	
}
?>