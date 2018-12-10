<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_NotifyErrors extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('errors/notify_errors.php');	
		$this->load->view('template/footer', $data);
	}

	public function accessNotify(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('errors/access_account_error.php');	
		$this->load->view('template/footer', $data);
	}

	public function statusAccount(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('errors/notify_account.php');	
		$this->load->view('template/footer', $data);
	}

	public function shareSuccessfully(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('home/notify_sharevideo.php');	
		$this->load->view('template/footer', $data);
	}

	public function shareUnSuccessfully(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('home/notify_unsuccess_sharevideo.php');	
		$this->load->view('template/footer', $data);
	}

	public function signupUnSuccessfully(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('home/notify_unsuccess_sharevideo.php');	
		$this->load->view('template/footer', $data);
	}
}