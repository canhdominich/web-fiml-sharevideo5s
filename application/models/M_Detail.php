<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Detail extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// List danh sach video da xem
	public function listVideoWatched($watched = array()){
		$query = "SELECT * FROM video WHERE video_id IN ?";
		$data = $this->db->query($query, array($watched));
		$data = $data->result_array();
		return $data;
	}

	// Lay video ngau nhien
	public function listRandomVideo(){
		$query = "SELECT * FROM video LIMIT 6";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// Cap nhat view cho video
	public function increaseView($video_id){
		$query = "UPDATE video SET views = views + 1 WHERE video_id = ? ";
	    $this->db->query($query, $video_id);
    }
}