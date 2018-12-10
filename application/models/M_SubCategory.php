<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_SubCategory extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllSubCategory(){
		$query = "SELECT * FROM sub_category";
		$this->db->where('status', 1);
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// lay subcategory theo sub_category_id
	public function getSubCategoryById($sub_category_id){
		$this->db->select('*');
		$this->db->where('sub_category_id', $sub_category_id);
		$this->db->where('status', 1);
		$data = $this->db->get('sub_category');
		$data = $data->result_array();
		return $data; 
	}

	// Xoa subcategory
	public function deleteSubCategory($sub_category_id){
		$this->db->where('sub_category_id', $sub_category_id);
		return $this->db->delete('sub_category');
	}

	// Cap nhat subcategory
	public function updateSubCategory($sub_category_id, $sub_category_name, $status){
		$data = array(
			'sub_category_id' => $sub_category_id,
			'sub_category_name' => $sub_category_name,
			'status' => $status
		);

		$this->db->where('sub_category_id', $sub_category_id);	
		return $this->db->update('sub_category', $data);
	}

	// Ham tao sub_category_id cho subcategory
	public function createSubCategoryId()
	{
		$this->db->select('sub_category_id');
		$this->db->where('status', 1);
		$result = $this->db->get('sub_category');		
		$result = $result->result_array();
		$count = 0;
		if (count($result) == 0) {
			return 1;
		} else {
			for ($i = 1; $i <= count($result); $i++) {
				foreach ($result as $j) {
					if ($i == $j['sub_category_id']) {
						$count++;
					}
				}
				if ($count < $i) {
					$sub_category_id = $i;
					return $sub_category_id;
				}
			}
			$sub_category_id = count($result) + 1;
			return $sub_category_id;
		}
	}

	// Them category
	public function insertSubCategory($sub_category_id, $category_id, $sub_category_name, $description, $status, $create_date){
		$data = array(
			'sub_category_id' => $sub_category_id,
			'category_id' => $category_id,
			'sub_category_name' => $sub_category_name,
			'description' => $description,
			'status' => $status,
			'create_date' => $create_date
		);

		return $this->db->insert('sub_category', $data);
	}

}
