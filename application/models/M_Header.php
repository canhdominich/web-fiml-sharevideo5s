<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Header extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function loadMenu(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$menu = $this->db->get('category');
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