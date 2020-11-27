<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct() {
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model("ModelCompany","modelCompany");
		$this->load->model("ModelUser","modelUser");
		$this->load->model("ModelVagon","modelVag");
		$this->load->model("ModelRuta","modelRut");
		$this->load->model("ModelParadero","modelPar");
			
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
			$this->load->view('layout/menu');
			$this->load->view('Estacion/GestionarEstacion');
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
	public function getEstaciones2(){
		echo json_encode($this->modelCompany->getEstaciones2());
	}

	public function getEstacionesPorId(){
		echo json_encode($this->modelCompany->getEstacionesById($this->input->post('id_est')));
	}

	public function editEstaciones(){
	    $param['ID_ESTACION'] = $this->input->post('ID_ESTACION');
	    $param['ID_TIPO_ESTACION'] = $this->input->post('ID_TIPO_ESTACION');
		$param['NOMBRE_ESTACION'] = $this->input->post('NOMBRE_ESTACION');
		$param['ID_ESTACION_VECINA_1'] = $this->input->post('ID_ESTACION_VECINA_1');
		$param['ID_ESTACION_VECINA_2'] = $this->input->post('ID_ESTACION_VECINA_2');
		
		echo $this->modelCompany->modifyEstacion($param);
	}

	public function deleteEstacion(){
		$param['ESTADO'] = 1;
		echo $this->modelCompany->deleteEstacion($this->input->post('ID_ESTACION'),$param);
	}

	

	public function showGestionarTipoEstation(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Estacion/GestionarTipoEstacion');
		$this->load->view('layout/footer');
	}

	public function guardarTipoEstacion(){
		$data = array(
			"NOMBRE_TIPO_ESTACION"=>$this->input->post("NOMBRE_TIPO_ESTACION"),
			);
		if($this->modelCompany->saveTipoEstacion($data)){
		    echo("ok");
		}else{
		    echo("err");
		}
	}

	public function getNumeroTipoEstacion(){
		echo json_encode($this->modelCompany->getNumeroTipoEstaciones());
	}

	public function getTipoEstaciones(){
		echo json_encode($this->modelCompany->getTipos());
	}

	public function getTipoEstacionesPorId(){
		echo json_encode($this->modelCompany->getTiposById($this->input->post("ID_TIPO_ESTACION")));
	}


	public function editTipoEstaciones(){
	    $param['ID_TIPO_ESTACION'] = $this->input->post('ID_TIPO_ESTACION');
	    $param['NOMBRE_TIPO_ESTACION'] = $this->input->post('NOMBRE_TIPO_ESTACION');
		
		echo $this->modelCompany->modifyTipoEstacion($param);
	}

	public function deleteTipoEstacion(){
		$param['ESTADO'] = 1;
		echo $this->modelCompany->deleteTipoEstacion($this->input->post('ID_TIPO_ESTACION'),$param);
	}

	public function showAddWagon(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Vagon/AgregarVagon');
		$this->load->view('layout/footer');
	}

	public function guardarVagon(){
		$data = array(
			"ID_ESTACION"=>$this->input->post("ID_ESTACION"),
			"NUMERO_VAGON"=>$this->input->post("NUMERO_VAGON"),
		);
		if($this->modelVag->saveVagon($data)){
		    echo("ok");
		}else{
		    echo("err");
		}
	}

	public function getVagones(){
		echo json_encode($this->modelVag->getVagon());
	}

	public function getvagonPorId(){
		echo json_encode($this->modelVag->getVagonById($this->input->post("ID_VAGON")));
	}

	public function editVagon(){
		$param['ID_VAGON'] = $this->input->post('ID_VAGON');
	    $param['ID_ESTACION'] = $this->input->post('ID_ESTACION');
	    $param['NUMERO_VAGON'] = $this->input->post('NUMERO_VAGON');
		
		echo $this->modelVag->modifyVagon($param);
	}

	public function deleteVagon(){
		$param['ESTADO'] = 1;
		echo $this->modelVag->deleteVagon($this->input->post('ID_VAGON'),$param);
	}

	public function showAddRoute(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Ruta/AgregarRuta');
		$this->load->view('layout/footer');
	}

	public function guardarRuta(){
		$data = array(
			"ID_TRONCAL_INICIO"=>$this->input->post("ID_TRONCAL_INICIO"),
			"ID_TRONCAL_FIN"=>$this->input->post("ID_TRONCAL_FIN"),
			"ID_ESTACION_INICIO"=>$this->input->post("ID_ESTACION_INICIO"),
			"ID_ESTACION_FIN"=>$this->input->post("ID_ESTACION_FIN"),
			"HORA_INICIO"=>$this->input->post("HORA_INICIO"),
			"HORA_FIN"=>$this->input->post("HORA_FIN"),
			"NOMBRE_RUTA"=>$this->input->post("NOMBRE_RUTA"),
		);
		if($this->modelRut->saveRuta($data)){
		    echo("ok");
		}else{
		    echo("err");
		}
	}

	public function showGestionarRuta(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Ruta/GestionarRuta');
		$this->load->view('layout/footer');
	}
	public function getRutas(){
		echo json_encode($this->modelRut->getRutas());
	}
	
	public function getRutaPorId(){
		echo json_encode($this->modelRut->getRutaById($this->input->post("ID_RUTA")));
	}

	public function editRuta(){
		$param['ID_RUTA'] = $this->input->post('ID_RUTA');
	    $param['ID_TRONCAL_INICIO'] = $this->input->post('ID_TRONCAL_INICIO');
		$param['ID_TRONCAL_FIN'] = $this->input->post('ID_TRONCAL_FIN');
		$param['ID_ESTACION_INICIO'] = $this->input->post('ID_ESTACION_INICIO');
		$param['ID_ESTACION_FIN'] = $this->input->post('ID_ESTACION_FIN');
		$param['NOMBRE_RUTA'] = $this->input->post('NOMBRE_RUTA');
		
		echo $this->modelRut->modifyRuta($param);
	}

	public function deleteRuta(){
		$param['ESTADO'] = 1;
		echo $this->modelRut->deleteRuta($this->input->post('ID_RUTA'),$param);
	}

	public function guardarTroncal(){
		$data = array(
			"NOMBRE_TRONCAL"=>$this->input->post("NOMBRE_TRONCAL"),
			"COLOR_TRONCAL"=>$this->input->post("COLOR_TRONCAL"),
		);
		if($this->modelRut->saveTroncal($data)){
		    echo("ok");
		}else{
		    echo("err");
		}
	}

	public function getTroncales(){
		echo json_encode($this->modelRut->getTroncales());
	}

	public function getTroncalPorId(){
		echo json_encode($this->modelRut->getTroncalesById($this->input->post("ID_TRONCAL")));
	}

	public function editTroncal(){
		$param['ID_TRONCAL'] = $this->input->post('ID_TRONCAL');
	    $param['NOMBRE_TRONCAL'] = $this->input->post('NOMBRE_TRONCAL');
	    $param['COLOR_TRONCAL'] = $this->input->post('COLOR_TRONCAL');
		
		echo $this->modelRut->modifyTroncal($param);
	}

	public function deleteTroncal(){
		$param['ESTADO'] = 1;
		echo $this->modelRut->deleteTroncal($this->input->post('ID_TRONCAL'),$param);
	}
	public function showGestionarTroncales(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Ruta/GestionarTroncal');
		$this->load->view('layout/footer');
	}

	public function showParaderos(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Paradero/GestionarParadero');
		$this->load->view('layout/footer');
	}

	public function guardarParadero(){
		$data = array(
			"ID_RUTA"=>$this->input->post("ID_RUTA"),
			"ID_VAGON"=>$this->input->post("ID_VAGON"),
		);
		if($this->modelPar->saveParadero($data)){
		    echo("ok");
		}else{
		    echo("err");
		}
	}

	public function getVagonesEstacion(){
		echo json_encode($this->modelPar->getVagonPorEstacion($this->input->post('ID_ESTACION')));
	}

	public function getParaderos(){
		echo json_encode($this->modelPar->getParaderos());
	}

	public function getParaderoPorId(){
		echo json_encode($this->modelPar->getParaderoById($this->input->post("ID_VAGON"),$this->input->post("ID_RUTA")));
	}

	public function editParadero(){
		$param['ID_VAGON'] = $this->input->post('ID_VAGON');
	    $param['ID_VAGON_N'] = $this->input->post('ID_VAGON_N');
		$param['ID_RUTA'] = $this->input->post('ID_RUTA');
		$param['ID_RUTA_N'] = $this->input->post('ID_RUTA_N');
		
		echo $this->modelPar->modifyParadero($param);
	}

	public function deleteParadero(){
		$param['ESTADO'] = 1;
		echo $this->modelPar->deleteParadero($this->input->post('ID_VAGON'),$this->input->post('ID_RUTA'),$param);
	}

	public function getParaderosPorEstacion(){
		echo json_encode($this->modelPar->getParaderoByEstacion($this->input->post("NOMBRE_ESTACION")));
	}

}
