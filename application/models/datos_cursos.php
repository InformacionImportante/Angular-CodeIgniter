<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_cursos extends CI_Model { 

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getCursos(){
		//return $this->db->get('cursos')->result();

		//$query = $this->db->get('cursos');
          //  return $query->result();
		 return $this->db->get_where('cursos', array('status' => 'Activo'))->result();

	}

	function crearCurso($nombre, $videos){
		$this->db->insert('cursos',array('nombreCurso' =>$nombre,
			'videosCurso' => $videos));
	}

	function actualizarCurso($id, $nombre, $videos){
		$this->db->update('cursos', array('nombreCurso' =>$nombre,
		'videosCurso' => $videos), array("idCurso" => $id) );
	}

	function borrarCurso($id){
		$this->db->update('cursos',array('status' =>'Inactivo'), array("idCurso" => $id)   );
	}



}

?>
