<?php

class ModelUser extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveUser($data){
        $this->db->insert('user',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function login($nom,$pass){
        $query = $this->db->query("SELECT * FROM user
        WHERE USER_NAME LIKE('".$nom."') AND
        USER_PASSWORD LIKE('".$pass."')");
        $r = $query->row();
          if($query->num_rows()>0){
              $session_user = array(
                  's_id_user' => $r->USER_ID ,
                  's_company_user' => $r->COMPANY_ID ,
               );
              $this->session->set_userdata($session_user);
            return TRUE;
          }else{
              return FALSE;
          }
      }
   
}