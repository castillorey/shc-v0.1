<!-- Menu -->
<div class="side-menu">
	<nav class="navbar navbar-default" role="navigation">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	        <div class="brand-wrapper">
	            <!-- Hamburger -->
	            <button type="button" class="navbar-toggle">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>

	            <!-- Brand -->
	            <div class="brand-name-wrapper">
	                <a class="navbar-brand" href="#">
	                    SHC
	                </a>
	            </div>
	        </div>
	    </div>

		<hr>
	    <!-- Main Menu -->
	    <div class="side-menu-container">
	    	
	    	
	        <ul class="nav navbar-nav">

		    	<!-- Admin info -->
		    	<br>
			    <div class="row">
			    	<div align="center" class="col-xs-4">
			    	  <img width="46px" src="<?php echo base_url('img/man.svg'); ?>">
			    	</div>
			    	<div class="col-xs-8">
			    	  <span>Bienvenido, <strong><?php echo $user;?></strong></span><br>
			    	  <a href="#" ><i class="fa fa-user"></i></a>&nbsp;
			    	  <a href="#" ><i class="fa fa-cog"></i></a>
			    	</div>
			    </div>

				<div class="container-fluid" style="background-color: gray;">
					<h4 style="color:white;">Escritorio</h4>
				</div>

	            <li class="active"><a href="#"><span class="glyphicon glyphicon-flash"></span> SHC's</a></li>
	            <li class=""><a href="#"><span class="glyphicon glyphicon-lamp"></span> Dispositivos</a></li>
	            <li class=""><a href="#"><span class="glyphicon glyphicon-calendar"></span> Horarios</a></li>


	            <li style="background-color: #d9534f;"><a style="color:white;" href="<?php echo site_url('logout'); ?>"><span class="glyphicon glyphicon-remove"></span> Cerrar sesión</a></li>

	        </ul>
	    </div><!-- /.navbar-collapse -->
	</nav> 
</div>