<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Admin_Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){

		// load video 
		$this->load->Model('M_Category');
		$video = $this->M_Category->getAllCategory();
		$data['listallcategory'] = array('allcategory' => $video);
		
		$this->load->View('manager/admin/category_view.php', $data);
	}

	// Ham lay category by category_id
    public function getCategoryById($category_id){
    	// get video 
    	$this->load->Model('M_Category');
    	$video = $this->M_Category->getCategoryById($category_id);
    	$data['getcategory'] = array('category' => $video);
    	$this->load->View('manager/admin/updatecategory_view.php', $data);
    }

	public function insertCategory(){
		// Tao category_id
		$this->load->Model('M_Category');
		$category_id = $this->M_Category->createCategoryId();

		$category_name = $this->input->post('category_name');
		$status = $this->input->post('status');
		$create_date = date("Y-m-d");

		$flag = $this->M_Category->insertCategory($category_id, $category_name, $status, $create_date);

		if($flag){
			header("location:".base_url()."index.php/manager/admin/category");
		}
		else{
			// message
		}
	}

	//xoa  category
	public function deleteCategory($category_id){
    	// load video 
		$this->load->Model('M_Category');
		$flag = $this->M_Category->deleteCategory($category_id);
		if($flag){
			header("location:".base_url()."index.php/manager/admin/category");
		}
		else{
			// message
		}
	}

	 // Ham update category
	public function updateCategory($category_id){
		$category_name = $this->input->post('category_name');
		$status = $this->input->post('status');
		$this->load->Model('M_Category');
		$flag = $this->M_Category->updateCategory($category_id, $category_name, $status);
		if($flag){
			header("location:".base_url()."index.php/manager/admin/category");
		}
		else{
			// message
		}
	}
}
?>