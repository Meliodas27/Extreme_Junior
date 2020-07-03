<?php 
require 'models/Usuario.php';
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

    public function buscar_usr($datos){
        $usuario = new Usuario();
    
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM PQUSUARIOS WHERE USCORREO = :correo AND USCONTRASENA = :pass  AND USESTADO=1');

            $query->execute([
                'correo' => $datos['correo'],
                'pass' => $datos['pass'],
            ]);
            
            while($row = $query->fetch()){
                
                $usuario->id= $row['USID'];
                $usuario->rol= $row['USROL'];
                $usuario->nombre=$row['USNOMBRE'];
                $usuario->correo=$row['USCORREO'];
            }
            return $usuario;
        }catch(PDOException $e){
            return null;
        }
    }
}
?>