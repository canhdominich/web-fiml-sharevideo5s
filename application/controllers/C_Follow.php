<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Follow extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function checkFollow($user_id, $follow_user_id){
		$this->load->Model('M_Follow');
		return $this->M_Follow->checkFollow($user_id, $follow_user_id);
	}

	public function addFollow($author_user_id, $follow_author){
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 

		if(!isset($_SESSION['username'])){
			header("Location: ".base_url()."index.php/C_Account/login");
		}
		else{
			$user_id = $author_user_id;

			$author = urldecode($follow_author);
			$author = str_replace("-", " ", $author);
			$author = trim($author);

			$this->load->Model('M_User');
			$follow_user_id = $this->M_User->getIdByAuthor($author);

			$create_date = date('Y-m-d');
			$status = 1;

			if($follow_user_id > 0){
				$this->load->Model('M_Follow');
				$flag = $this->M_Follow->addFollow($user_id, $follow_user_id, $create_date, $status);
				if($flag){
					header("Location: ".base_url()."index.php/video/author/".$follow_author);
				}
				else{

				}
			}
			else{

			}
		}
	}


	public function deleteFollow($author_user_id, $follow_author){
		$user_id =  $author_user_id;

		$author = urldecode($follow_author);
		$author = str_replace("-", " ", $author);
		$author = trim($author);

		$this->load->Model('M_User');
		$follow_user_id = $this->M_User->getIdByAuthor($author);

		if($follow_user_id > 0){
			$this->load->Model('M_Follow');
			$flag = $this->M_Follow->deleteFollow($user_id, $follow_user_id);
			if($flag){
				header("Location: ".base_url()."index.php/video/author/".$follow_author);
			}
			else{
				header("Location: ".base_url()."index.php/video/author/".$follow_author);
			}
		}
		else{

		}
	}
}