<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_controller extends CI_Controller { 

	function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('datos_cursos');
		$this->load->helper('url');
	}

	function index(){
		$this->load->view('cursos/cursos');
	}


	function getInformacion(){
		$datos_cursos = $this->datos_cursos->getCursos();
		print_r (json_encode($datos_cursos));
	}

	function recibirdatos(){

	   $postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $nombre = $request->nombre;
	    $videos = $request->videos;

		$this->datos_cursos->crearCurso($nombre,$videos);
		$this->load->view('cursos/cursos');

	}

	function editardatos(){
	   $postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $id = $request->id;
	    $nombre = $request->nombre;
	    $videos = $request->videos;

		$this->datos_cursos->actualizarCurso($id, $nombre, $videos);
		$this->load->view('cursos/cursos');
	}

	function borrardatos(){
	   	$postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $id = $request->id;

		$this->datos_cursos->borrarCurso($id);
		$this->load->view('cursos/cursos');

	}



}

?>
