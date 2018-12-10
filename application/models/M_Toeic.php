<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Toeic extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function loadVideo(){
		$query = "SELECT * FROM ((video INNER JOIN sub_category ON video.sub_category = sub_category.sub_category )  sub_category INNER JOIN category ON sub_category.category = category = category)";

		
		$menu = $menu->result_array();
		return $menu;
	}

	// them muc cho menu
	public function insertMenu($category_id, $category_name, $status, $create_date){
		$data = array(
			'category_id' => $category_id,
			'category_name' => $category_name,
			'status' => $status,
			'create_date' => $create_date
		);

		$this->db->insert('category', $data);
		return $this->db->insert_id();
	}

	// cap nhat-chinh sua muc trong menu
	public function updateMenu($category_id, $category_name, $status, $create_date){
		$data = array(
			'category_id' => $category_id,
			'category_name' => $category_name,
			'status' => $status,
			'create_date' => $create_date
		);

		$this->where('category_id', $category_id);
		return $this->update('category', $data);
	}

	// xoa muc trong menu
	public function deleteMenu($category_id){
		$this->db->where('category_id', $category_id);
		return $this->db->delete('category');
	}
}
?>