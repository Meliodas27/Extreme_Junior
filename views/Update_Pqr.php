<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php'; ?>
<body>
      <div class="container"> 
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
		  <form action="<?php echo constant('URL'); ?>Pqr_con/Actualizar/" method="post" autocomplete="off"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">P<span>Q</span>R<p>
		    </div>
		</div>
		
		<div class="row">
		   <div class="col-md-12 login-from-row">
           <label for="Solicitud">Escoja una opción:</label>
                <select name="estadot" id="estadot">
                <?php include_once 'models/Pqr.php';

                    foreach ($this->Pqr as $row) {
                        $pqr = new Pqr();
                        $pqr = $row; ?>
                    <option value="<?php echo $pqr->valor?>"><?php echo $pqr->Estado?></option>
                    <?php } ?>

		   </div>
		</div>

        <div class="row">
            <div class="col-md-12 login-from-row">
                <textarea class="form-control" rows="5" id="asuntot" name="asuntot" placeholder="Asunto">
                <?php echo $pqr->Asunto?></textarea>
                <input type="hidden" name="pid" value="<?php echo $pqr->id?>" >
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