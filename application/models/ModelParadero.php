<?php

class ModelParadero extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveParadero($data){
        $this->db->insert('paradero',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getVagonPorEstacion($id){
        $query = $this->db->query("SELECT * FROM `vagon` v
        WHERE v.ESTADO = 0 AND ID_ESTACION =".$id);
        return $query->result();
    }

    function getParaderos(){
        $query = $this->db->query("SELECT * FROM `paradero` p
        INNER JOIN ruta r ON r.ID_RUTA = p.ID_RUTA
        INNER JOIN vagon v ON v.ID_VAGON = p.ID_VAGON
        INNER JOIN estacion e ON e.ID_ESTACION = v.ID_ESTACION
        WHERE p.ESTADO = 0 AND
        e.ESTADO = 0 AND
        v.ESTADO = 0 ");
        return $query->result();
    }

    function getParaderoByEstacion($NOMBRE_ESTACION){
        $query = $this->db->query("SELECT r.NOMBRE_RUTA FROM `paradero` p
        INNER JOIN ruta r ON r.ID_RUTA = p.ID_RUTA
        INNER JOIN vagon v ON v.ID_VAGON = p.ID_VAGON
        INNER JOIN estacion e ON e.ID_ESTACION = v.ID_ESTACION
        WHERE p.ESTADO = 0 AND e.NOMBRE_ESTACION LIKE('".$NOMBRE_ESTACION."')");
        return $query->result();
    }

    function getParaderoById($IDVAGON,$IDRUTA){
        $query = $this->db->query("SELECT * FROM `paradero` p
        INNER JOIN ruta r ON r.ID_RUTA = p.ID_RUTA
        INNER JOIN vagon v ON v.ID_VAGON = p.ID_VAGON
        INNER JOIN estacion e ON e.ID_ESTACION = v.ID_ESTACION
        WHERE p.ID_RUTA =".$IDRUTA." AND
        p.ID_VAGON =".$IDVAGON);
        return $query->result();
    }

    public function modifyParadero($param){
		$campos = array(
			'ID_VAGON' => $param['ID_VAGON_N'],
			'ID_RUTA' => $param['ID_RUTA_N'],
		);
        $this->db->where('ID_VAGON', $param['ID_VAGON']);
        $this->db->where('ID_RUTA', $param['ID_RUTA']);
		$this->db->update('Paradero',$campos);
		
		return 1;
    }
    
    public function deleteParadero($IDVAGON,$IDRUTA,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
        $this->db->where('ID_VAGON', $IDVAGON);
        $this->db->where('ID_RUTA',$IDRUTA);
		$this->db->update('Paradero',$campos);
		return 1;
	}
}