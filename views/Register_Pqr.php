<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php'; ?>
<body>
      <div class="container"> 
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
		  <form action="<?php echo constant('URL'); ?>Pqr_con/Registrar/" method="post" autocomplete="off"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">P<span>Q</span>R<p>
		    </div>
		</div>
		
		<div class="row">
		   <div class="col-md-12 login-from-row">
           <label for="Solicitud">Escoja una opción:</label>
                <select name="tipo" id="tipo">
                    <option value="1">Peticion</option>
                    <option value="2">Queja</option>
                    <option value="3">Reclamo</option>
		   </div>
		</div>

        <div class="row">
            <div class="col-md-12 login-from-row">
                <textarea class="form-control" rows="5" id="asunto" name="asunto" placeholder="Asunto"></textarea>
                 </div>
            </div>

            <div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-info">Guardar</button>
		   </div>
		</div>
		
	    </form>
	</div>
     </div>
  </div>
</body>
</html>