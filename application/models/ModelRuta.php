<?php

class ModelRuta extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveRuta($data){
        $this->db->insert('ruta',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getRutas(){
        $query = $this->db->query("SELECT ID_RUTA ,NOMBRE_RUTA,
        (SELECT NOMBRE_TRONCAL FROM `troncal` WHERE ID_TRONCAL  = r.ID_TRONCAL_INICIO )AS TroncalIni, 
        (SELECT NOMBRE_TRONCAL FROM `troncal` WHERE ID_TRONCAL = r.ID_TRONCAL_FIN )AS TroncalFin,
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = r.ID_ESTACION_INICIO )AS EstacionIni,
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = r.ID_ESTACION_FIN )AS EstacionFin,HORA_INICIO,HORA_FIN  
        FROM `ruta` r 
        WHERE r.ESTADO = 0");
        return $query->result();
    }

    function getRutaById($ID){
        $data = "";
        $this->db->select('*');
        $this->db->from('ruta');
        $this->db->where('ID_RUTA',$ID);
        $query = $this->db->get();
        return $query->result();
    }

    public function modifyRuta($param){
		$campos = array(
            'NOMBRE_RUTA' => $param['NOMBRE_RUTA'],
            'ID_TRONCAL_INICIO' => $param['ID_TRONCAL_INICIO'],
            'ID_TRONCAL_FIN' => $param['ID_TRONCAL_FIN'],
            'ID_ESTACION_INICIO' => $param['ID_ESTACION_INICIO'],
            'ID_ESTACION_FIN' => $param['ID_ESTACION_FIN']
		);
		$this->db->where('ID_RUTA', $param['ID_RUTA']);
		$this->db->update('ruta',$campos);
		
		return 1;
    }

    public function deleteRuta($ID,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
		$this->db->where('ID_RUTA', $ID);
		$this->db->update('ruta',$campos);
		return 1;
    }

    function saveTroncal($data){
        $this->db->insert('troncal',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getTroncales(){
        $data = 0;
        $this->db->select('*');
        $this->db->from('troncal');
        $this->db->where('ESTADO',$data);
        $query = $this->db->get();
        return $query->result();
    }

    function getTroncalesById($ID){
        $data = "";
        $this->db->select('*');
        $this->db->from('troncal');
        $this->db->where('ID_TRONCAL',$ID);
        $query = $this->db->get();
        return $query->result();
    }

    public function modifyTroncal($param){
		$campos = array(
            'NOMBRE_TRONCAL' => $param['NOMBRE_TRONCAL'],
            'COLOR_TRONCAL' => $param['COLOR_TRONCAL']
		);
		$this->db->where('ID_TRONCAL', $param['ID_TRONCAL']);
		$this->db->update('troncal',$campos);
		
		return 1;
    }

    public function deleteTroncal($ID,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
		$this->db->where('ID_TRONCAL', $ID);
		$this->db->update('troncal',$campos);
		return 1;
    }
}