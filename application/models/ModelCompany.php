<?php

class ModelCompany extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveEstacion($data){
        $this->db->insert('estacion',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getCompanys(){
        $query = $this->db->query("SELECT * FROM company");
        return $query->result();
    }

    function getEstaciones2(){
        $query = $this->db->query("SELECT ID_ESTACION,te.NOMBRE_TIPO_ESTACION,NOMBRE_ESTACION,
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = e1.ID_ESTACION_VECINA_1)AS NombreVeci1, 
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = e1.ID_ESTACION_VECINA_2)AS NombreVeci2 
        FROM `estacion` e1 INNER JOIN tipo_estacion te ON te.ID_TIPO_ESTACION = e1.ID_TIPO_ESTACION
        WHERE e1.ESTADO = 0");
        return $query->result();
    }

    function getEstacionesById($id){
        $query = $this->db->query("SELECT ID_ESTACION,te.NOMBRE_TIPO_ESTACION,NOMBRE_ESTACION,e1.ID_TIPO_ESTACION,e1.ID_ESTACION_VECINA_1,e1.ID_ESTACION_VECINA_2, 
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = e1.ID_ESTACION_VECINA_1)AS NombreVeci1, 
        (SELECT NOMBRE_ESTACION FROM `estacion` WHERE ID_ESTACION = e1.ID_ESTACION_VECINA_2)AS NombreVeci2 
        FROM `estacion` e1 INNER JOIN tipo_estacion te ON te.ID_TIPO_ESTACION = e1.ID_TIPO_ESTACION
        WHERE e1.ID_ESTACION =".$id);
        return $query->result();
    }

    public function modifyEstacion($param){
		$campos = array(
			'ID_TIPO_ESTACION' => $param['ID_TIPO_ESTACION'],
			'NOMBRE_ESTACION' => $param['NOMBRE_ESTACION'],
			'ID_ESTACION_VECINA_1' => $param['ID_ESTACION_VECINA_1'],
			'ID_ESTACION_VECINA_2' => $param['ID_ESTACION_VECINA_2'],
		);
		$this->db->where('ID_ESTACION', $param['ID_ESTACION']);
		$this->db->update('estacion',$campos);
		
		return 1;
    }
    
    public function deleteEstacion($ID,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
		$this->db->where('ID_ESTACION', $ID);
		$this->db->update('estacion',$campos);
		return 1;
    }
    
    // GESTIÓN TIPO ESTACIÓN

    function saveTipoEstacion($data){
        $this->db->insert('tipo_estacion',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getTipos(){
        $data = 0;
        $this->db->select('*');
        $this->db->from('tipo_estacion');
        $this->db->where('ID_TIPO_ESTACION !=',1);
        $this->db->where('ESTADO',$data);
        $query = $this->db->get();
        return $query->result();
    }

    function getTiposById($ID){
        $data = "";
        $this->db->select('*');
        $this->db->from('tipo_estacion');
        $this->db->where('ID_TIPO_ESTACION',$ID);
        $query = $this->db->get();
        return $query->result();
    }

    function getNumeroTipoEstaciones(){
        $data = "";
        $this->db->select('*');
        $this->db->from('tipo_estacion');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function modifyTipoEstacion($param){
		$campos = array(
			'NOMBRE_TIPO_ESTACION' => $param['NOMBRE_TIPO_ESTACION']
		);
		$this->db->where('ID_TIPO_ESTACION ', $param['ID_TIPO_ESTACION']);
		$this->db->update('tipo_estacion',$campos);
		
		return 1;
    }
    
    public function deleteTipoEstacion($ID,$param){
        $campos = array(
			'ESTADO' => $param['ESTADO'],
		);
		$this->db->where('ID_TIPO_ESTACION', $ID);
		$this->db->update('tipo_estacion',$campos);
		return 1;
    }
    
}