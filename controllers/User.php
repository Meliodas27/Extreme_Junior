<?php 
class User extends Controller
{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        
    }

    function render(){
        $this->view->render('Register');
    }

    function Registro(){
     
        $this->view->render('Register');
        
    }

    function Registrar(){
        $nombre = $_POST['nombre'].' '.$_POST['apellido'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $rol=2;
        $estado=1;

        if($this->model->insertar(['nombre' => $nombre, 'correo' => $correo, 'pass' => $pass,
        'rol' => $rol, 'estado' => $estado ])){
            $this->view->mensaje = "Usuario Registrado Exitosamente";
            $this->view->render('Login');
        }else{
            $this->view->mensaje = "El usuario ya se encuentra registrado";
            $this->view->render('Login');
        }

    }

    function Login(){
      

        if(!isset($_POST['correot'])){
            $this->view->mensaje = "Página No encontrada";
            $this->view->render('Login');
        }else{

        
        $correo = $_POST['correot'];
        $pass = $_POST['passt'];
        $usuario = $this->model->buscar_usr(['correo' => $correo, 'pass' => $pass]);

        if($usuario->id>0){
            session_start();
            $_SESSION["id_usuario"] = $usuario->id;
            $_SESSION["rol_usuario"] = $usuario->rol;
            $this->loadModel('Pqr');
            $Pqr=$this->model->getPqr($usuario->id,$usuario->rol);
            $this->view->mensaje="Bienvenido";
            $this->view->Pqr=$Pqr;
            if($_SESSION["rol_usuario"]>1){
                $this->view->render('PQR_Usr');

            }else{
                $this->view->render('PQR');

            }

        }else{
            $this->view->mensaje = "El usuario no se encuentra registrado";
            $this->view->render('Login');

        }
    }
   
    }

    function logout(){
        session_start();
        session_unset();
        $this->view->mensaje = "Vuelva Pronto";
        $this->view->render('Login');
    }

    
}
?>