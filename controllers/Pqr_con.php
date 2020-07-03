<?php 
class Pqr_con extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        
    }

    function render(){
        $this->view->render('Register_Pqr');
    }


    function Registro(){
     
        $this->view->render('Register_Pqr');
 
    }

    function Registrar(){
        
        $asunto = $_POST['asunto'];
        $tipo = $_POST['tipo'];
        $fechaact=date('Y-m-d');
        $fechalim=date('Y-m-d');

        switch($tipo){

            case '1':
            $fechalim=date("Y-m-d",strtotime($fechaact."+ 7 days"));
            break;
            case '2':
                $fechalim=date("Y-m-d",strtotime($fechaact."+ 3 days"));
            break;
            case '3':
                $fechalim=date("Y-m-d",strtotime($fechaact."+ 2 days"));
            break;
        }
        $estado=1;

        $this->loadModel('Pqr');
        session_start();

        if($this->model->insertar(['tipo' => $tipo, 'estado' => $estado, 
        'fechaact' => $fechaact,'fechalim' => $fechalim, 
        'asunto' => $asunto,'usid'=> $_SESSION["id_usuario"]])){
            $Pqr=$this->model->getPqr($_SESSION["id_usuario"],
            $_SESSION["rol_usuario"] );
            $this->view->Pqr=$Pqr;
            if($_SESSION["rol_usuario"]>1){
                $this->view->render('PQR_Usr');

            }else{
                $this->view->render('PQR');

            }
            
        }else{
            $this->view->mensaje = "Error  al registrar la peticion";
            $this->view->render('Register_Pqr');
        }

    }
    function Eliminar($id=null){

        $this->loadModel('Pqr');
        session_start();
        if($this->model->eliminar_pqr($id[0])){
            $Pqr=$this->model->getPqr($_SESSION["id_usuario"],
            $_SESSION["rol_usuario"] );
            $this->view->Pqr=$Pqr;
            if($_SESSION["rol_usuario"]>1){
                
                $this->view->render('PQR_Usr');

            }else{
                $this->view->render('PQR');

            }
        }else{
            $mensaje = "No se pudo eliminar la PQR";
        }
    }

    function Editar($id=null){

        $this->loadModel('Pqr');
        session_start();
        $Pqr = $this->model->Buscar_Pqr($id[0]);
       
          $this->view->Pqr=$Pqr;
             $this->view->render('Update_Pqr');

          
        }

        function Actualizar(){
            session_start();

            $this->loadModel('Pqr');
            $asunto = $_POST['asuntot'];
            $estado = $_POST['estadot'];
            $id=$_POST['pid'];
            if($this->model->actualizar(['estado' => $estado,
            'asunto' => $asunto,'id'=>$id])){
                $Pqr=$this->model->getPqr($_SESSION["id_usuario"],
            $_SESSION["rol_usuario"] );
                $this->view->Pqr=$Pqr;
            if($_SESSION["rol_usuario"]>1){
                
                $this->view->render('PQR_Usr');

            }else{
                $this->view->render('PQR');

            }
            }else {
                $mensaje = "No se pudo Actualizar la PQR";

            }
     
            }
    
    
}


?>