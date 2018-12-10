<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Admin_Slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		// lay tat ca slide advertisment_level = 0
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlide();
		$data['listallslide'] = array('allslide' => $slide);
		
		return $this->load->View('manager/search_video.php', $data);
	}
}