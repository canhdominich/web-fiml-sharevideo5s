<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_ShareVideo extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// get all link video
	public function getAllLinkVideo(){
		$this->db->select('*');
		$data = $this->db->get('sharevideolink');
		$data = $data->result_array();
		return $data;
	}

	public function getLinkNameVideoById($video_id){
		$this->db->select('link');
		$data = $this->db->get('sharevideolink');
		$data = $data->result();
		return $data;
	}

	// get all link video
	public function getAllLinkVideoUnAgreed(){
		$this->db->select('*');
		$this->db->where('status', 0);
		$data = $this->db->get('sharevideolink');
		$data = $data->result_array();
		return $data;
	}

		// get all link video
	public function getAllLinkVideoAgreed(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$data = $this->db->get('sharevideolink');
		$data = $data->result_array();
		return $data;
	}

	// update status link video
	public function updateStatusOneLinkVideoById($video_id){
		$data = array(
			'status' => 1
		);

		$this->db->where('video_id', $video_id);
		return $this->db->update('sharevideolink', $data);
	}

	// update status link video
	public function updateStatusZeroLinkVideoById($video_id){
		$data = array(
			'status' => 0
		);

		$this->db->where('video_id', $video_id);
		return $this->db->update('sharevideolink', $data);
	}


	// update status link video
	public function updateStatusTwoLinkVideoById($video_id){
		$data = array(
			'status' => 2
		);

		$this->db->where('video_id', $video_id);
		return $this->db->update('sharevideolink', $data);
	}

	// get all link video 
	public function getLinkVideoById($video_id){
		$this->db->select('*');
		$this->db->where('video_id', $video_id);
		$data = $this->db->get('sharevideolink');
		$data = $data->result_array();
		return $data;
	}

	// add link video
	public function insertLinkVideo($link, $user_id, $create_date, $status){
		$data = array(
			'link' => $link,
			'user_id' => $user_id,
			'create_date' => $create_date,
			'status' => $status
		);
		return $this->db->insert('sharevideolink', $data);
	}

	// delete link video
	public function deleteLinkVideoById($video_id){
		$this->db->where('video_id', $video_id);
		return $this->db->delete('sharevideolink');
	}
}
?>