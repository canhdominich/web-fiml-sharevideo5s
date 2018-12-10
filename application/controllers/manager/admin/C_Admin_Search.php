<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Admin_Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$query = $this->input->get('query');
		// load video 
		$this->load->Model('M_Video');
		$video = $this->M_Video->searchListVideo($query);
		$data['listresultvideo'] = array('resultvideo' => $video);

		// lay all ten subcategory phuc vu phan them subcategory
		$this->load->Model('M_SubCategory');
		$video = $this->M_SubCategory->getAllSubCategory();
		$data['listallsubcategory'] = array('allsubcategory' => $video);
		
		return $this->load->View('manager/admin/search_video.php', $data);
	}
}