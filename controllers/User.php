<?php 
class User extends Controller
{
    function __construct(){
        parent::__construct();
        
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
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
    }

    
}
?>