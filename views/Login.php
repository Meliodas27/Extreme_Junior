
<!DOCTYPE html>
<html >
<?php require 'views/header.php'; ?>
  <body>
     <div class="container"> 
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
		  <form action="<?php echo constant('URL'); ?>User/Login/" method="post"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">Bien<span>Venido</span><p>
		    </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="correot" id="correot" type="text" placeholder="Correo" required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="passt" id="passt" type="password" placeholder="Contraseña" required/>
		   </div>
		</div>

		<div class="row">
		   <div class="col-md-12 login-from-row">
		   <label for="Name"><?php if (isset($this->mensaje)){ echo $this->mensaje;} ?></label>
		   </div>
		</div>

		
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-info">Entrar</button>
			  <a href="<?php echo constant('URL'); ?>User/Registro" class="btn btn-info">Registro</a>
		   </div>
		</div>

		
	    </form>
	</div>
     </div>
  </div>
</body>
</html>