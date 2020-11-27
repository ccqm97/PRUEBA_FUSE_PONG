<?php

class ModelVagon extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveVagon($data){
        $this->db->insert('vagon',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getVagon(){
        $query = $this->db->query("SELECT * FROM `vagon` v
        INNER JOIN estacion e ON e.ID_ESTACION = v.ID_ESTACION
        WHERE v.ESTADO = 0");
        return $query->result();
    }

    function getVagonById($ID){
        $data = "";
        $this->db->select('*');
        $this->db->from('vagon v');
        $this->db->join('estacion e', 'e.ID_ESTACION = v.ID_ESTACION');
        $this->db->where('ID_VAGON',$ID);
        $query = $this->db->get();
        return $query->result();
    }

    public function modifyVagon($param){
		$campos = array(
			'ID_ESTACION ' => $param['ID_ESTACION'],
			'NUMERO_VAGON' => $param['NUMERO_VAGON'],
		);
		$this->db->where('ID_VAGON', $param['ID_VAGON']);
		$this->db->update('vagon',$campos);
		
		return 1;
    }
    
    public function deleteVagon($ID,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
		$this->db->where('ID_VAGON', $ID);
		$this->db->update('vagon',$campos);
		return 1;
	}

}