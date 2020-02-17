
<?php 
$controladores=$_SESSION['controladores'];
 function getcontrolador($controlador,$controladores){
 	$display="display:none";
 	
 	if (!empty($controladores))
 	{
 	foreach ($controladores as $res)
 	{
 		if($res->nombre_controladores==$controlador)
 		{
 			$display= "display:block";
 			break;
 			
 		}
 	}
 	}
 	
 	return $display;
 }
 
  $usuarios=new UsuariosModel();
 $cedula_usuarios=$usuarios->encriptar($_SESSION['cedula_usuarios']);
 
 
?>








<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li  style="<?php echo getcontrolador("MenuAdministracion",$controladores) ?>"  ><a    ><i class="fa fa-users"></i> Administración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Usuarios",$controladores) ?>"><a href="index.php?controller=Usuarios&action=index">Usuarios</a></li>
                      <li style="<?php echo getcontrolador("Firmas",$controladores) ?>"><a href="index.php?controller=Firmas&action=index">Firmas Usuarios</a></li>
                      <li style="<?php echo getcontrolador("Controladores",$controladores) ?>"><a href="index.php?controller=Controladores&action=index">Controladores</a></li>
                      <li style="<?php echo getcontrolador("Roles",$controladores) ?>"><a href="index.php?controller=Roles&action=index">Roles de Usuario</a></li>
                      <li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>"><a href="index.php?controller=PermisosRoles&action=index">Permisos Roles</a></li>
                      <li style="<?php echo getcontrolador("Sesiones",$controladores) ?>"><a href="index.php?controller=Sesiones&action=index">Sesiones</a></li>
                      <li style="<?php echo getcontrolador("PublicidadMovil",$controladores) ?>"><a href="index.php?controller=PublicidadMovil&action=index">Publicidad Movil</a></li>
                      </ul>
                  </li>
                  
                  
                <li style="<?php echo getcontrolador("MenuGestionTramites",$controladores) ?>"  ><a><i class="fa fa-file-o"></i> Gestión de Trámites <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li style="<?php echo getcontrolador("Memos",$controladores) ?>"><a href="index.php?controller=Memos&action=index">Crear Memorandun</a></li>
                	<li style="<?php echo getcontrolador("SolicitudPrestamo",$controladores) ?>"><a href="index.php?controller=SolicitudPrestamo&action=index3">Solicitud Prestamo</a></li>
                     </ul>
                 </li>
                  
                  
                  <li  style="<?php echo getcontrolador("MenuServiciosLinea",$controladores) ?>"  ><a    ><i class="fa fa-bars"></i> Servicios en Linea <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("SaldosCuentaIndividual",$controladores) ?>"><a href="index.php?controller=SaldosCuentaIndividual&action=index">Consulta de Saldos Cuenta Individual y Créditos</a></li>
                      <!--<li style="<?php echo getcontrolador("Usuarios",$controladores) ?>"><a href="index.php?controller=Usuarios&action=resetear_clave">Solicita tu clave personal</a></li>-->
                     <li style="<?php echo getcontrolador("SimuladorCredito",$controladores) ?>"><a href="http://186.4.157.125/rp_c/index.php?controller=CargarParticipes&action=index&cedula=<?php echo $cedula_usuarios;?>"  target="_blank">Simulador de Crédito</a></li>
                     
					 <!--<li style="<?php echo getcontrolador("SimuladorCredito",$controladores) ?>"><a href="http://186.4.157.125/rp_c/index.php?controller=CargarParticipes&action=index&cedula=<?php echo $_SESSION['cedula_usuarios'];?>"  target="_blank">Simulador de Crèdito</a></li>-->
                      <!--<li style="<?php echo getcontrolador("SimuladorCredito",$controladores) ?>"><a href="index.php?controller=SimuladorCredito&action=index">Simulador de Crédito</a></li>-->
                       <li style="<?php echo getcontrolador("SolicitudPrestamo",$controladores) ?>"><a href="index.php?controller=SolicitudPrestamo&action=index">Generar Solicitud Préstamo</a></li>
                       <li style="<?php echo getcontrolador("SolicitudPrestamo",$controladores) ?>"><a href="index.php?controller=SolicitudPrestamo&action=index2">Consultar Solicitud Préstamo</a></li>
						<li style="<?php echo getcontrolador("ConsultaTramites",$controladores) ?>"><a href="index.php?controller=ConsultaTramites&action=index">Consulta Trámites</a></li>
                      </ul>
                  </li>
                  
                  
                    <li ><a    ><i class="fa fa-file-o"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       
						<!--
						<li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=dic_2017" target="_blank">Estados Financieros al 31 de Diciembre del 2017</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=ene_2018" target="_blank">Estados Financieros al 31 de Enero del 2018</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=fec_2018" target="_blank">Estados Financieros al 28 de Febrero del 2018</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=jul_2018" target="_blank">Estados Financieros al 31 de Julio del 2018</a></li>
                       -->
						
						<li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=oct_2018" target="_blank">Estados Financieros al 31 de Octubre del 2018</a></li>
                 
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_nov_2018" target="_blank">Estados Financieros al 30 de Noviembre del 2018</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_dic_2018" target="_blank">Estados Financieros al 31 de Diciembre del 2018</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_ene_2019" target="_blank">Estados Financieros al 31 de Enero del 2019</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_feb_2019" target="_blank">Estados Financieros al 28 de Febrero del 2019</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_mar_2019" target="_blank">Estados Financieros al 31 de Marzo del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_abr_2019" target="_blank">Estados Financieros al 30 de Abril del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_may_2019" target="_blank">Estados Financieros al 31 de Mayo del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_jun_2019" target="_blank">Estados Financieros al 30 de Junio del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_jul_2019" target="_blank">Estados Financieros al 31 de Julio del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_ago_2019" target="_blank">Estados Financieros al 31 de Agosto del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_sep_2019" target="_blank">Estados Financieros al 30 de Septiembre del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_oct_2019" target="_blank">Estados Financieros al 31 de Octubre del 2019</a></li>
					   <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=estado_nov_2019" target="_blank">Estados Financieros al 30 de Noviembre del 2019</a></li>
					 
					 
					 
                        <li><a>Auditoria Nuñez Serrano Asociados<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=dic_2014_Informe_Adtitores_Independientes" target="_blank">Informe de los auditores independientes 31-12-2014</a></li>
                            <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=dic_2014_Informe_Confidencial" target="_blank">Informe Confidencial Sobre la Evaluación del Control Interno 31-12-2014</a></li>
                            <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=dic_2014_Informe_Procedimientos" target="_blank">Informe de Procedimientos Previamente Convenidos 31-12-2014</a></li>
                            <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&fec=dic_2014_Informe_Auditoría_Rubro" target="_blank">Informe de Auditoría al Rubro de Inversiones Privativas 31-12-2014</a></li>
                            </ul>
                        </li>
                   </ul>
                  </li>
                  
                  
                  
                  <li><a><i class="fa fa-file-o"></i> Reglamentos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=cod_gob" target="_blank">Código del Buen Gobierno Corporativo</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=cod_etic" target="_blank">Código de Ética</a></li>
                     
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=reg_est" target="_blank">Reglamento al Estatuto</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=reg_contra" target="_blank">Reglamento de Contrataciones</a></li>
                     
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=reg_cre" target="_blank">Reglamento de Crédito</a></li>
                       <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=reg_recau" target="_blank">Reglamento de Recaudaciones</a></li>
                     
                      <li><a href="index.php?controller=SaldosCuentaIndividual&action=attachment&reg=reg_elec" target="_blank">Reglamento de Elecciones</a></li>
                     
                    
                     
                     
                     </ul>
                  </li>
                  
                  
                  
                  <li style="<?php echo getcontrolador("MenuMemos",$controladores) ?>"  ><a><i class="fa fa-file-o"></i> Gestión de Trámites <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li style="<?php echo getcontrolador("Memos",$controladores) ?>"><a href="index.php?controller=Memos&action=index">Crear Memorandun</a></li>
                	   <li style="<?php echo getcontrolador("SolicitudPrestamo",$controladores) ?>"><a href="index.php?controller=SolicitudPrestamo&action=index5">Solicitud Prestamo</a></li>
                     </ul>
                 </li>
                  
                  
                  <li style="<?php echo getcontrolador("MenuReportes",$controladores) ?>"  ><a><i class="fa fa-file-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li style="<?php echo getcontrolador("Reportes",$controladores) ?>"><a href="index.php?controller=Reportes&action=index">Consultar</a></li>
                	</ul>
                  </li>
                  
                  
                   <li ><a    ><i class="fa fa-file-o"></i> Información <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="index.php?controller=Informacion&action=index">Conoce nuestros servicios y convenios.</a></li>
                   </ul>
                  </li>
                  
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="index.php?controller=Usuarios&action=Loguear">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
</a></div>
