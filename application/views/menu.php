
<!-- Menu -->
<nav class="menu" tabindex="0">
  	<div class="smartphone-menu-trigger"></div>
    <header>
      <div class="avatar">
        <img src="<?php echo base_url('img/man.svg'); ?>" />
        <div><span><h4><?php echo $user;?></h4></span></div> 
      </div>
    </header>

    <div class="container-fluid label-menuPrincipal">
    	<span><h4>Menú</h4></span>
    </div>
  	<ul>
        <a href="<?php echo site_url('tomas');?>">
      		<li tabindex="0" class="<?php echo $seccionSHC;?> icon-shc">
      			<span> <h5>SHC's</h5></span>
      		</li>
        </a>

        <a href="<?php echo site_url('horarios'); ?>">
        	<li tabindex="0" class="<?php echo $seccionHorarios;?> icon-horarios">
        		<span> <h5>Horarios</h5></span> 
        	</li>
        </a>

      	<a href="<?php echo site_url('logout'); ?>">
          <li tabindex="0" class="label-cerrarSesion icon-close">
      		  <span> <h5>Cerrar sesión</h5></span> 
          </li>
        </a>
    </ul>
</nav>

