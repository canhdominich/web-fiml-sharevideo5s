<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Video extends CI_Model{

	private $limit = 5;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getLimitValue(){
		return $this->limit;
	}

	// lay tat ca video
	public function getAllVideo(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->limit(7);
		$this->db->order_by('video_id', 'asc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	public function getAllData(){
		$this->db->select('*');
		$this->db->order_by('date', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	public function getAllVideoByUserId($user_id){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('user_id', $user_id);
		$this->db->order_by('date', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	// lay video theo ten - the loai - danh muc
	public function getListVideo(){
		$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id   INNER JOIN category ON sub_category.category_id = category.category_id";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// lay sub_category cua video duoc chon (kich chuot)
	public function getSubCategory($video_id = 0){
		$this->db->select('sub_category_id');
		$this->db->where('video_id', $video_id);
		$data = $this->db->get('video');
		$data = $data->result_array();
		foreach ($data as $value) {
			$sub_category_id = $value['sub_category_id'];
		}
		return $sub_category_id;
	}


	// lay video goi y theo the loai loai tru video dang xem
	public function getVideoBySubCategory($sub_category_id, $video_id){
		$this->db->select('*');
		$this->db->where('sub_category_id', $sub_category_id);
		$this->db->where('status', 1);
		$this->db->where('video_id !=', $video_id);
		$this->db->limit(10);
		$this->db->order_by('views', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	// liet ke video theo tung danh muc(category) dua vao category_id
	public function getVideoByCategory(){
		$this->load->model('M_Category', 'm_category');
		$listcategory = $this->m_category->getAllCategory();
		foreach ($listcategory as $category) {
			$query = "SELECT * FROM video INNER JOIN sub_category ON video.sub_category_id = sub_category.sub_category_id WHERE sub_category.category_id = ? ORDER BY Date DESC LIMIT 15 ";

			$data[$category['category_name']] = $this->db->query($query, array($category['category_id']));
			$data[$category['category_name']] = $data[$category['category_name']]->result_array();
		}
		return $data;
	}

	// lay video theo id
	public function getVideoById($video_id){
		$this->db->select('*');
		$this->db->where('video_id', $video_id);
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data; 
	}

	// lay 2 video noi bat
	public function getVideosCover(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->limit(2);
		$this->db->order_by('date', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	// lay 5 video duoc xem nhieu nhat
	public function getMostViewVideos(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->limit(10);
		$this->db->order_by('views', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	// lay 10 video duoc dang tai moi nhat
	public function getNewVideos(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->limit(10);
		$this->db->order_by('date', 'desc');
		$data = $this->db->get('video');
		$data = $data->result_array();
		return $data;
	}

	// Tim kiem video theo ten phuc vu search ajax
	public function findVideoByName($title){
		$query = "SELECT * FROM video  WHERE video.title LIKE '%$title%' ORDER BY Date DESC";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// Tim kiem video theo ten phuc vu search thuong
	public function searchListVideo($title){
		$query = "SELECT * FROM video  WHERE video.title LIKE '%$title%' ORDER BY Date DESC";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}

	// Tim kiem video theo ten phuc vu search thuong nhung ho tro ajax phan pagination xem them
	public function searchVideoByName($title, $start){
		$query = "SELECT * FROM video  WHERE video.title LIKE '%$title%' ORDER BY Date DESC LIMIT $start, $this->limit";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}


	// Them video
	public function insertVideo($video_id, $sub_category_id, $title, $link, $image, $limit_time,$descriptions, $date, $author, $user_id, $views, $status){
		$data = array(
			'video_id' => $video_id,
			'sub_category_id' => $sub_category_id,
			'title' => $title,
			'link' => $link,
			'limit_time' => $limit_time,
			'image' => $image,
			'descriptions' => $descriptions,
			'date' => $date,
			'author' => $author,
			'user_id' => $user_id,
			'views' => $views,
			'status' => $status
		);

		return $this->db->insert('video', $data);
	}

	// Cap nhat video
	public function updateVideo($video_id, $title, $link, $image, $limit_time, $descriptions, $status){
		$data = array(
			'video_id' => $video_id,
			'title' => $title,
			'link' => $link,
			'image' => $image,
			'descriptions' => $descriptions,
			'status' => $status
		);

		$this->db->where('video_id', $video_id);
		return $this->db->update('video', $data);
	}

	// Xoa video
	public function deleteVideoById($video_id){
		$this->db->where('video_id', $video_id);
		return $this->db->delete('video');
	}

	// Xoa video
	public function deleteVideo($video_id, $user_id){
		$this->db->where('video_id', $video_id);
		$this->db->where('user_id', $user_id);
		return $this->db->delete('video');
	}

	// Ham tao video_id cho video
	public function createVideoId()
	{
		$this->db->select('video_id');
		$this->db->where('status', 1);
		$result = $this->db->get('video');		
		$result = $result->result_array();
		$count = 0;
		if (count($result) == 0) {
			return 1;
		} else {
			for ($i = 1; $i <= count($result); $i++) {
				foreach ($result as $j) {
					if ($i == $j['video_id']) {
						$count++;
					}
				}
				if ($count < $i) {
					$video_id = $i;
					return $video_id;
				}
			}
			$video_id = count($result) + 1;
			return $video_id;
		}
	}

	// lay follow_user_id datheo doi cua nguoi dung dua tren bang follow_channel
	// public function getFollowUserId($user_id){
	// 	$result = array();
	// 	$query = "SELECT follow_user_id FROM follow_channel WHERE user_id = $user_id";
	// 	$rs = $this->db->query($query);
	// 	$rs = $rs->result_array();
	// 	foreach($rs as $follow_user_id){
	// 		array_push($result, $follow_user_id['follow_user_id']);
	// 	}
	// 	return $result;
	// }

	// lay video dua tren follow_user_id
	// public function getVideoByFollowUserId($user_id){
	// 	$arr = $this->getFollowUserId($user_id);
	// 	if(count($arr) > 0){
	// 		$this->db->select('*');
	// 		$this->db->where_in('user_id', $arr);
	// 		$this->db->limit(50);
	// 		$this->db->order_by('date', 'desc');
	// 		$data = $this->db->get('video');
	// 		$data = $data->result_array();
	// 		return $data;
	// 	}
	// 	else{
	// 		return array();
	// 	}
	// }

	public function getVideoByFollowUserId($user_id){
		$query = "SELECT video.* FROM follow_channel, users, video WHERE follow_channel.user_id = $user_id AND follow_channel.follow_user_id = users.user_id AND users.user_id = video.user_id ORDER BY Date DESC LIMIT 50 ";
		$data = $this->db->query($query);
		$data = $data->result_array();
		return $data;
	}
}
?>