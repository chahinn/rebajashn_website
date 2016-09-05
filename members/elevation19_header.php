 
 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
           <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
          </a>
          <a class="brand" href="start.php">Elevation19 <img src="../assets/img/center.png" class="img-logo" width="235" height="100"> </a>
          
		  <div class="nav-collapse">
          <ul class="nav" style="font-size:18px;" >
		     <!--<li><a href="#" onclick="alert('apertura');$('#cont').show();"> Inicio</a></li>-->
            <li <?php if($opcion_menu==1 ){ echo 'class="active font-menu"';};?>><a href="start.php" > Inicio</a></li>
			<li <?php if($opcion_menu==2 ){ echo 'class="active font-menu"';};?>><a href="elevation19_ofertas.php">Ofertas</a></li>
			<li <?php if($opcion_menu==3 ){ echo 'class="active font-menu"';};?>><a href="elevation19_evento.php">Eventos</a></li>
            <li <?php if($opcion_menu==4 ){ echo 'class="active font-menu"';};?>><a href="elevation19_como.php">Como Funciona</a></li>
          
          </ul>          
		  <ul class="nav pull-right">
            <li class="divider-vertical"></li>
            <li class="dropdown">
			   
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../assets/img/avatar.png"> <?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="elevation19_perfil.php"><i class="icon-user"></i> Perfil</a></li>
                <li><a href="elevation19_misofertas.php"><i class="icon-list-alt"></i> Mis Cupones</a></li>
               
                <li class="divider"></li>
                <li><a href="start.php?logout" title="Salir del Sistema"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
		
          </div><!--/.nav-collapse -->
        </div>
      </div>
      <div class="linea-roja">&nbsp;</div><!--Red-linea-->
  </div>