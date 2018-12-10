<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function checkAccount($email, $password){
		$query = "SELECT * FROM users WHERE users.email = ? AND users.password = ? AND users.status = ?";
		$data = $this->db->query($query, array($email, $password, 1));
		$data = $data->result_array();
		return $data;
	}

	public function insertUser($author, $avatar, $email, $password, $create_date, $status, $level)
	{
		$data = array(
			'author' => $author,
			'avatar' => $avatar,
			'email' => $email,
			'password' => $password,
			'create_date' => $create_date,
			'status' => $status,
			'level' => $level
		);
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function getAllAccount()
	{
		$this->db->select('*');
		$this->db->order_by('user_id', 'asc');
		$data = $this->db->get('user');
		$data = $data->result_array();

		return $data;
	}

	public function getAccountById($user_id){
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$data = $this->db->get('users');
		$data = $data->result_array();
		return $data;
	}

	public function getAuthorById($user_id){
		$this->db->select('author');
		$this->db->where('user_id', $user_id);
		$data = $this->db->get('users');
		$data = $data->result_array();
		return $data;
	}

	public function getIdByAuthor($author){
		$this->db->select('user_id');
		$this->db->where('author', $author);
		$user_id = $this->db->get('users')->result_array();
		if(count($user_id) > 0){
			return $user_id[0]['user_id'];
		}
		return -1;
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
		return $this->db->update('users', $data);
	}

	public function deleteById($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->delete('users');

	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */