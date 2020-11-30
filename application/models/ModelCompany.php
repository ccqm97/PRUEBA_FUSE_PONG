<?php

class ModelCompany extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function getCompanys(){
        $query = $this->db->query("SELECT * FROM company");
        return $query->result();
    }   
    
}