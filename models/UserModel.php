<?php 

class UserModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
        $query = $this->db->connect()->prepare('INSERT INTO PQUSUARIOS (USNOMBRE, USCORREO, USCONTRASENA,USROL,USESTADO) VALUES(:nombre, :correo, :pass, :rol, :estado)');
        try{
            $query->execute([
                'nombre' => $datos['nombre'],
                'correo' => $datos['correo'],
                'pass' => $datos['pass'],
                'rol' => $datos['rol'],
                'estado' => $datos['estado'],
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
        
    }
}
?>