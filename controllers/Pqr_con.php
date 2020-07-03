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
            $this->view->mensaje = $fechaact;
            $this->view->render('PQR');
        }else{
            $this->view->mensaje = "Error  al registrar la peticion";
            $this->view->render('Register_Pqr');
        }

    }
    
}


?>