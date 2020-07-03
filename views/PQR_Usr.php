<!doctype html>
<html lang="en">
<?php require 'views/header_pqr.php'; ?>
  <body>
    <h1 class="text-center">PETICIONES, QUEJAS, RECLAMOS</h1>    
    
    <div class="container">
    
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Asunto</th>
                        <th>Estado</th>
                        <th>Fecha de Creacion</th>
                        <th>Fecha Limite</th>                        
                    </tr>
                </thead>
                <tbody>
                      <?php
            include_once 'models/Pqr.php';

            foreach ($this->Pqr as $row) {
                $pqr = new Pqr();
                $pqr = $row;
        ?>
                <tr>
                    <td><?php echo $pqr->Tipo; ?></td>
                    <td><textarea rows="auto" readonly style="border: none"><?php echo $pqr->Asunto; ?></textarea></td>
                    <td><?php echo $pqr->Estado; ?></td>
                    <td><?php echo $pqr->FechaSol; ?></td>
                    <td><?php echo $pqr->FechaLim; ?></td>
                </tr>
        <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha Solicitada</th>
                        <th>Fecha Limite</th>
                        <th>Asunto</th>

                    </tr>
                </tfoot>
            </table>  
         
           </div>
       </div> 
       <div class="row">
		   <div class="col-md-12 login-from-row">
           <a class="btn  btn-primary btn-lg" href="<?php echo constant('URL').'Pqr_con/Registro'?>">Agregar P.Q.R</a>
           <a class="btn  btn-danger btn-lg" href="<?php echo constant('URL').'User/Logout/'?>">Cerrar Sesion</a>
			  
		   </div>
		</div>
    </div>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    } );  
    
    </script>
      
      
  </body>
</html>