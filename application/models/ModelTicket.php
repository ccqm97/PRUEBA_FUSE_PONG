<?php

class ModelTicket extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function saveTicket($data){
        $this->db->insert('ticket',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function getTickets($userId){
        $query = $this->db->query("SELECT * FROM ticket t
        INNER JOIN user_history uh ON uh.USER_HISTORY_ID = t.USER_HISTORY_ID
        INNER JOIN project p ON p.PROJECT_ID = uh.PROJECT_ID
        INNER JOIN company c ON c.COMPANY_ID = p.COMPANY_ID
        WHERE t.USER_ID =".$userId);
        return $query->result();
    }

    function changeTicketState($ticketID,$param){
        $campos = array(
			'TICKET_STATE' => $param['TICKET_STATE']
		);
        $this->db->where('TICKET_ID',$ticketID);
        $this->db->update('ticket',$campos);
        echo("Sdsd".$param['TICKET_STATE']);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}