<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Follow extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function addFollow($user_id, $follow_user_id, $create_date, $status)
	{
		$data = array(
			'user_id' => $user_id,
			'follow_user_id' => $follow_user_id,
			'create_date' => $create_date,
			'status' => $status
		);
		return $this->db->insert('follow_channel', $data);
	}

	public function deleteFollow($user_id, $follow_user_id){
		$query = "DELETE FROM follow_channel WHERE follow_channel.user_id = ? AND follow_channel.follow_user_id = ? ";
		return $this->db->query($query, array($user_id, $follow_user_id));
	}

	public function checkFollow($user_id, $follow_user_id){
		$query = "SELECT * FROM follow_channel WHERE follow_channel.user_id = ? AND follow_channel.follow_user_id = ?";
		$rs = $this->db->query($query, array($user_id, $follow_user_id));
		$rs = $rs->result_array();
		if(count($rs) > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function getAllFollowedChannel($author)
	{
		$this->db->select('*');
		$this->db->where('author', $author);
		$this->db->order_by('create_date', 'desc');
		$data = $this->db->get('follow_channel');
		$data = $data->result_array();

		return $data;
	}

	public function getChannelById($user_id){
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$data = $this->db->get('users');
		$data = $data->result_array();
		return $data;
	}

	public function updateById($user_id,$username,$password,$email,$phone_number,$address){
		$data = array(
			'user_name' => $username,
			'password' => $password,
			'email' => $email,
			'phone_number' => $phone_number,
			'address' => $address 
		);
		$this->db->where('user_id', $user_id);
		return $this->db->update('user', $data);
	}

	public function deleteById($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->delete('user');

	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */