<?php

class ModelProject extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function getProjects($idCompany){
        $query = $this->db->query("SELECT * FROM project WHERE project.COMPANY_ID = ".$idCompany);        
        return $query->result();
    }   
    

}