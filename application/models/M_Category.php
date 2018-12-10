<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Category extends CI_Model{
	private $limit = 10;
	private $start = 0;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getLimitValue(){
		return $this->limit;
	}

	public function getAllCategory(){
		$query = "SELECT * FROM category";
		$this->db->where('status', 1);
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// lay video theo id
	public function getCategoryById($category_id){
		$this->db->select('*');
		$this->db->where('category_id', $category_id);
		$this->db->where('status', 1);
		$data = $this->db->get('category');
		$data = $data->result_array();
		return $data; 
	}

	// DANH CHO LOAD CATEGORY
	// lay tat ca nhung video thuoc ve 1 danh muc nao do dua vao (category_name)
	public function getVideoByCategoryName($category_name){
		$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id INNER JOIN category ON  sub_category.category_id = category.category_id  WHERE category.category_name = ? ORDER BY date DESC LIMIT $this->limit";
		$data = $this->db->query($query, array($category_name));
		$data = $data->result_array();
		return $data;
	}

	// lay 5 video duoc dang tai moi nhat cho 1 danh muc(category) dua vao category_name
	public function getNewVideos($category_name){
		$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id INNER JOIN category ON  sub_category.category_id = category.category_id WHERE category.category_name = ? LIMIT 5";
		$data = $this->db->query($query, array($category_name));
		$data = $data->result_array();
		return $data;
	}

	// lay 10 video duoc xem nhieu nhat cho 1 danh muc(category) dua vao category_name
	public function getMostViewVideos($category_name){
		$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id INNER JOIN category ON  sub_category.category_id = category.category_id WHERE category.category_name = ? LIMIT 10";
		$data = $this->db->query($query, array($category_name));
		$data = $data->result_array();
		return $data;
	}

	// Dem so luong video co cung category_name
	public function getNumberVideosTogetherCategoryName($category_name){
		$query = "SELECT COUNT(*) FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id INNER JOIN category ON  sub_category.category_id = category.category_id WHERE category.category_name = ?";
		$rs = $this->db->query($query, array($category_name));
		return $rs->result();
	}

	// Liet ke nhung video duoc phan dua tren current_page
	// Vi du gioi han 8 bai ten 1 trang
	// Neu current_page = 3 thi video bat dau tu video so (3-1)*8 + 1 = 16
	// Khi dung voi limit (16, 8)
	public function getListVideoByRequest($category_name, $start){
		$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id INNER JOIN category ON  sub_category.category_id = category.category_id WHERE category.category_name = ? ORDER BY date DESC LIMIT $start, $this->limit";
		$data = $this->db->query($query, array($category_name));
		$data = $data->result_array();
		return $data;
	}

	// Cap nhat video
	public function updateCategory($category_id, $category_name, $status){
		$data = array(
			'category_id' => $category_id,
			'category_name' => $category_name,
			'status' => $status
		);

		$this->db->where('category_id', $category_id);
		return $this->db->update('category', $data);
	}

	// Xoa category
	public function deleteCategory($category_id){
		$this->db->where('category_id', $category_id);
		return $this->db->delete('category');
	}

	// Ham tao category_id cho category
	public function createCategoryId()
	{
		$this->db->select('category_id');
		$this->db->where('status', 1);
		$result = $this->db->get('category');		
		$result = $result->result_array();
		$count = 0;
		if (count($result) == 0) {
			return 1;
		} else {
			for ($i = 1; $i <= count($result); $i++) {
				foreach ($result as $j) {
					if ($i == $j['category_id']) {
						$count++;
					}
				}
				if ($count < $i) {
					$video_id = $i;
					return $category_id;
				}
			}
			$category_id = count($result) + 1;
			return $category_id;
		}
	}

	// Them category
	public function insertCategory($category_id, $category_name, $status, $create_date){
		$data = array(
			'category_id' => $category_id,
			'category_name' => $category_name,
			'status' => $status,
			'create_date' => $create_date
		);

		return $this->db->insert('category', $data);
	}

}
