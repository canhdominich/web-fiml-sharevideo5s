<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Author_Videos extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getVideoByAuthor($author){
		$query = "SELECT * FROM video WHERE author = ?";
		$data = $this->db->query($query, array($author));
		$data = $data->result_array();
		return $data;
	}
}