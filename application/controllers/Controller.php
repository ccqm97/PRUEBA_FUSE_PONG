<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct() {
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model("ModelCompany","modelCompany");
		$this->load->model("ModelUser","modelUser");
		$this->load->model("ModelTicket","modelTicket");
		$this->load->model("ModelProject","modelProject");
		$this->load->model("ModelUserHistory","modelUserHistory");		
	}

	public function index(){
		$this->login();
	}

	public function login(){
		if($this->session->userdata('s_id_user')){
			header("location:".base_url()."index.php/Controller/home");	
		}else{
			$this->load->view('login/login');
		}		
	}

	public function logout(){
        $this->session->sess_destroy();
        $this->output ->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output ->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $this->output ->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $this->output ->set_header('Pragma: no-cache');
        $this -> output -> delete_cache ();
        header("location:".base_url());
	}

	public function home(){
		if($this->session->userdata('s_id_user')){
			$this->load->view('layout/header');
			$this->load->view('ticket/GestionarTicket');
			$this->load->view('layout/footer');
		}else{
			header("location:".base_url());	
		}
	}

	public function registerUser(){
		$data = array(
			"USER_NAME "=>$this->input->post("USER_NAME"),
			"USER_PASSWORD"=>$this->input->post("USER_PASSWORD"),
			"COMPANY_ID "=>$this->input->post("COMPANY_ID"),			
			);
		echo($this->modelUser->saveUser($data));
		
	}

	public function loginUser(){
		$user = $this->input->post("USER_NAME");
		$pass = $this->input->post("USER_PASSWORD");	
		echo($this->modelUser->login($user, $pass));      	    
	}
	
	public function showGestionarEstation(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Estacion/GestionarEstacion');
		$this->load->view('layout/footer');
	}
	
	public function getCompanys(){
		echo json_encode($this->modelCompany->getCompanys());
	}

	public function getTickets(){
		echo json_encode($this->modelTicket->getTickets($this->session->userdata('s_id_user')));
	}	

	
	public function getProjects(){
		echo json_encode($this->modelProject->getProjects($this->session->userdata('s_company_user')));
	}

	public function saveTicket(){
		$data = array(
			"USER_HISTORY_ID "=>$this->input->post("USER_HISTORY_ID"),
			"USER_ID"=>$this->session->userdata('s_id_user'),			
			);
		echo($this->modelTicket->saveTicket($data));
		
	}

	public function saveUserHistory(){
		$data = array(
			"USER_HISTORY_DESCRIPTION "=>$this->input->post("USER_HISTORY_DESCRIPTION"),
			"PROJECT_ID"=>$this->input->post("PROJECT_ID"),			
			);
		echo($this->modelUserHistory->saveUserHistory($data));
		
	}

	public function changeTicketState(){		
		if ($this->input->post("TICKET_STATE")==0) {
			$param['TICKET_STATE'] = 1;
		}else{
			$param['TICKET_STATE'] = 0;
		}
		echo ($this->modelTicket->changeTicketState($this->input->post("TICKET_ID"),$param));
	}
}
