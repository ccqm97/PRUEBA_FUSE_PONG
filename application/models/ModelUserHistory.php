<?php

class ModelUserHistory extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveUserHistory($data){
        $this->db->insert('user_history',$data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

    function getUserHistory($userId){
        $query = $this->db->query("SELECT * FROM user_history uh
        INNER JOIN ticket t ON uh.USER_HISTORY_ID = t.USER_HISTORY_ID
        INNER JOIN project p ON p.PROJECT_ID = uh.PROJECT_ID
        INNER JOIN company c ON c.COMPANY_ID = p.COMPANY_ID
        WHERE t.USER_ID =".$userId);
        return $query->result();
    }

}