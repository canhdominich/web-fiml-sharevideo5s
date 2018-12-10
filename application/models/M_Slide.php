<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Slide extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// lay tat ca slide
	// public function getAllSlide(){
	// 	$this->db->select('*');
	// 	$this->db->where('status', 1);
	// 	$this->db->where('advertisment_level', 0);
	// 	$this->db->order_by('date', 'desc');
	// 	$data = $this->db->get('slide');
	// 	$data = $data->result_array();
	// 	return $data;
	// }

	public function getAllSlide(){
		$this->db->select('image, link');
		$this->db->where('level', 0);
		$this->db->where('status', 1);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('advertisement');
		$data = $data->result_array();
		return $data;
	}

	// home
	public function getAllSlideOne(){
		$this->db->select('image, link');
		$this->db->where('level', 1);
		$this->db->where('status', 1);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('advertisement');
		$data = $data->result_array();
		return $data;
	}

	// category
	public function getAllSlideTen(){
		$this->db->select('image, link');
		$this->db->where('level', 10);
		$this->db->where('status', 1);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('advertisement');
		$data = $data->result_array();
		return $data;
	}

	public function getAllSlideElevent(){
		$this->db->select('image, link');
		$this->db->where('level', 11);
		$this->db->where('status', 1);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('advertisement');
		$data = $data->result_array();
		return $data;
	}


	public function getAllSlideTwo(){
		$this->db->select('image, link');
		$this->db->where('level', 20);
		$this->db->where('status', 1);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('advertisement');
		$data = $data->result_array();
		return $data;
	}


	// Them slide
	public function insertSlide($slide_id, $link, $image, $descriptions, $date, $author, $advertisment_level, $status){
		$data = array(
			'slide_id' => $slide_id,
			'link' => $link,
			'image' => $image,
			'descriptions' => $descriptions,
			'date' => $date,
			'author' => $author,
			'advertisment_level' => $advertisment_level,
			'status' => $status
		);

		return $this->db->insert('slide', $data);
	}

	// Cap nhat video
	public function updateSlide($slide_id, $link, $image, $descriptions, $date, $author, $advertisment_level, $status){
		$data = array(
			'slide_id' => $slide_id,
			'link' => $link,
			'image' => $image,
			'descriptions' => $descriptions,
			'date' => $date,
			'author' => $author,
			'advertisment_level' => $advertisment_level,
			'status' => $status
		);

		$this->db->where('slide_id', $slide_id);
		return $this->db->update('slide', $data);
	}

	// Xoa video
	public function deleteSlide($slide_id){
		$this->db->where('slide_id', $slide_id);
		return $this->db->delete('slide');
	}

	// Ham tao video_id cho video
	public function createSlideId()
	{
		$this->db->select('slide_id');
		$this->db->where('status', 1);
		$result = $this->db->get('slide');		
		$result = $result->result_array();
		$count = 0;
		if (count($result) == 0) {
			return 1;
		} else {
			for ($i = 1; $i <= count($result); $i++) {
				foreach ($result as $j) {
					if ($i == $j['slide_id']) {
						$count++;
					}
				}
				if ($count < $i) {
					$slide_id = $i;
					return $slide_id;
				}
			}
			$slide_id = count($result) + 1;
			return $slide_id;
		}
	}

}
?>