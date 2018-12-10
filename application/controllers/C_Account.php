<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function login(){
		$this->load->view('home/login.php');	
	}

	public function logout(){
		session_start();
		session_unset();
		header("Location: ".base_url()."index.php/home");
	}

	public function checkAccount(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->load->Model('M_User');
		$users = $this->M_User->checkAccount($email, md5($password));
		
		if(count($users) == 1){
			$_SESSION['username'] = $users;
			
			if($_SESSION['username'][0]['level'] == 0){
				header("Location: ".base_url()."index.php/home");
			}
			else{
				if($_SESSION['username'][0]['level'] == 1){
					header("Location: ".base_url()."index.php/manager/myvideo");
				}
				else{
					if($_SESSION['username'][0]['level'] == 2){
						header("Location: ".base_url()."index.php/manager/admin/system");
					}
					else{
						header("Location: ".base_url()."index.php/view/login");
					}
				}
			}
		}
		else{
			header("Location: ".base_url()."index.php/C_NotifyErrors/accessNotify");
		}
	}

	public function signup(){
		$this->load->view('home/signup.php');	
	}

	public function insertUser()
	{
		$author = $this->input->post('author');
		$avatar = "avatar.png";
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$create_date = date("Y-m-d");
		$status = 1;
		$level = 0;
		$this->load->Model('M_User');
		$user_id = $this->M_User->insertUser($author, $avatar, $email, md5($password), $create_date, $status, $level);

		$users = $this->M_User->getAccountById($user_id);
		if(count($users) > 0){
			if(!isset($_SESSION)) 
			{ 
				session_start(); 
			} 
			$_SESSION['username'] = $users;
			header("Location: ".base_url()."index.php/C_Home");
		}
		else{
			header("Location: ".base_url()."index.php/C_NotifyErrors/signupUnSuccessfully");
		}
	}

}