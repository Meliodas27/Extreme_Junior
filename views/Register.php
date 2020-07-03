<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php'; ?>
<body>
      <div class="container"> 
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
		  <form action="<?php echo constant('URL'); ?>User/Registrar/" method="post" autocomplete="off"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">Regi<span>stro</span><p>
		    </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="nombre" id="nombre" type="text" placeholder="Nombre" autocomplete="off" required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="apellido" id="apellido" type="text" placeholder="Apellido" autocomplete="off" required/>
		   </div>
		</div>

        <div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="correo" id="correo" type="email" placeholder="Correo" autocomplete="off" required/>
		   </div>
		</div>

        <div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="pass" id="pass" type="password"  placeholder="Contraseña" autocomplete="off" required/>
		   </div>
		</div>


		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-info">Registrar</button>
			  <a href="<?php echo constant('URL'); ?>" class="btn btn-info">Login</a>
		   </div>
		</div>

		
	    </form>
	</div>
     </div>
  </div>
</body>
</html>