<?php 
require 'models/Pqr.php';
class PqrModel extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
        $query = $this->db->connect()->prepare('INSERT INTO PQPETICIONES (PTIPO, PESTADO, PFECHASYS, 
        PFECHATRANSLIMIT, PASUNTO, USID) VALUES(:tipo, :estado, :fechaact, :fechalim, :asunto, :usid)');
        try{
            $query->execute([
                'tipo' => $datos['tipo'],
                'estado' => $datos['estado'],
                'fechaact' => $datos['fechaact'],
                'fechalim' => $datos['fechalim'],
                'asunto' => $datos['asunto'],
                'usid' => $datos['usid']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function eliminar_pqr($id){
        $query = $this->db->connect()->prepare('DELETE FROM PQPETICIONES WHERE PID ='.$id);
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function getPqr($usid,$rol){
        $pqr = [];
    
        try{
            if($rol!=1){
                $query = $this->db->connect()->prepare('SELECT * FROM PQPETICIONES WHERE USID='.$usid.' order by PID');

            }else{
                $query = $this->db->connect()->prepare('SELECT * FROM PQPETICIONES WHERE PESTADO!=3 order by PID');
            }
            $query->execute();
            
            while($row = $query->fetch()){
                $pqr_item=new Pqr();
                $pqr_item->id= $row['PID'];
                $pqr_item->Asunto=$row['PASUNTO'];
                $pqr_item->FechaSol=$row['PFECHASYS'];
                $pqr_item->FechaLim=$row['PFECHATRANSLIMIT'];

                switch($row['PESTADO']){
                    case 1:
                        $pqr_item->Estado='Nuevo';
                    break;
                    case 2:
                        $pqr_item->Estado='En ejecución';
                    break;
                    case 3:
                        $pqr_item->Estado='Vencido';
                    break;

                }

                switch($row['PTIPO']){
                    case 1:
                        $pqr_item->Tipo='Petición';
                    break;
                    case 2:
                        $pqr_item->Tipo='Queja';
                    break;
                    case 3:
                        $pqr_item->Tipo='Reclamo';
                    break;

                }
                array_push($pqr, $pqr_item);

            }
            return $pqr;
        }catch(PDOException $e){
            return null;
        }
    }

    public function Buscar_Pqr($id){
        $pqr = [];
    
        try{
    
                $query = $this->db->connect()->prepare('SELECT * FROM PQPETICIONES WHERE PID='.$id);

            $query->execute();
            
            while($row = $query->fetch()){


                for ($i=$row['PESTADO']+1; $i <=3 ; $i++) { 
                    $pqr_item=new Pqr();
                    $pqr_item->Asunto =$row['PASUNTO'];
                    $pqr_item->id= $row['PID'];
                    $pqr_item->valor=$i;
                    switch($i){
                        case 1:
                            $pqr_item->Estado='Nuevo';
                        break;
                        case 2:
                            $pqr_item->Estado='En ejecución';
                        break;
                        case 3:
                            $pqr_item->Estado='Cerrado';
                        break;
                    }
                    array_push($pqr, $pqr_item);

                }


            }
            return $pqr;
        }catch(PDOException $e){
            return null;
        }
    }

    public function actualizar($datos){
        $query = $this->db->connect()->prepare('UPDATE PQPETICIONES SET PESTADO= :estado, PASUNTO= :asunto WHERE
        PID= :id');
        try{
            $query->execute([
                'estado' => $datos['estado'],
                'asunto' => $datos['asunto'],
                'id' => $datos['id']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}



?>