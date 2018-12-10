<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Admin_SubCategory extends CI_Controller {

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

		// load subcategory 
		$this->load->Model('M_SubCategory');
		$video = $this->M_SubCategory->getAllSubCategory();
		$data['listallsubcategory'] = array('allsubcategory' => $video);

		// lay all ten category phuc vu phan them subcategory
		$this->load->Model('M_Category');
		$video = $this->M_Category->getAllCategory();
		$data['listallcategory'] = array('allcategory' => $video);
		
		// $this->load->view('manager/header_view');
		$this->load->View('manager/admin/subcategory_view.php', $data);
		// $this->load->view('template/footer', $data);
	}

	// Ham xoa subcategory
	 // Ham xoa video
	public function deleteSubCategory($subcategory_id){
    	// load video 
		$this->load->Model('M_SubCategory');
		$flag = $this->M_SubCategory->deleteSubCategory($subcategory_id);
		if($flag){
			header("location:".base_url()."index.php/manager/admin/sub-category");
		}
		else{
			// message
		}
	}

	// Ham lay category by category_id
	public function getSubCategoryById($sub_category_id){
    	// get video 
		$this->load->Model('M_SubCategory');
		$video = $this->M_SubCategory->getSubCategoryById($sub_category_id);
		$data['getsubcategory'] = array('subcategory' => $video);
		$this->load->View('manager/admin/updatesubcategory_view.php', $data);
	}

	public function insertSubCategory(){
		// Tao subcategory
		$this->load->Model('M_SubCategory');
		$sub_category_id = $this->M_SubCategory->createSubCategoryId();

		$category_id = $this->input->post('category_id');
		$sub_category_name = $this->input->post('sub_category_name');
		$status = $this->input->post('status');
		$description = $this->input->post('description');
		$create_date = date("Y-m-d");

		$flag = $this->M_SubCategory->insertSubCategory($sub_category_id, $category_id, $sub_category_name, $description, $status, $create_date);

		if($flag){
			header("location:".base_url()."index.php/manager/admin/sub-category");
		}
		else{
			// message
		}
	}

	 // Ham update subcategory
	public function updateSubCategory($sub_category_id){
		$sub_category_name = $this->input->post('sub_category_name');
		$status = $this->input->post('status');
		$this->load->Model('M_SubCategory');
		$flag = $this->M_SubCategory->updateSubCategory($sub_category_id, $sub_category_name, $status);
		if($flag){
			header("location:".base_url()."index.php/manager/admin/sub-category");
		}
		else{
			// message
		}
	}
}
?>