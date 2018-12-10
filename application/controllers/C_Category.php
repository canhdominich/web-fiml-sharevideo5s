<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Category extends CI_Controller {

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

	public function checkArray($video){
		$count = 0;
		while(next($video)){
			$count++;
		}
		if($count != 0){
			return true;
		}
		else{
			return false;
		}
	}

	// Ham kiem tra bien $category_name co bi rong hay khong
	public function checkString($category_name){
		if(strlen($category_name)>=2){
			return true;
		}
		else{
			return false;
		}
	}

	public function loadCategory($category_name){
		// giai ma dau vao
		$category_name = urldecode($category_name);
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);
		$this->load->view('template/header');

		// lay tat ca slide advertisment_level = 10
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlideTen();
		$data['listallslideten'] = array('allslideten' => $slide);

		// lay tat ca sidebar advertisment_level = 11
		$slide = $this->M_Slide->getAllSlideElevent();
		$data['listallslideelevent'] = array('allslideelevent' => $slide);


		//kiem tra bien $category
		if($this->checkString($category_name)){
			// Kiem tra xem danh muc(category) co ton tai video nao khong
			// Neu khong se hien thi thong bao
			$this->load->Model('M_Category');
			$video = $this->M_Category->getVideoByCategoryName($category_name);
			$video = array('videobycategory' => $video);

			// lay tat ca slide advertisment_level = 11 len sidebar
			$this->load->Model('M_Slide');
			$slide = $this->M_Slide->getAllSlideElevent();
			$data['listallslideelevent'] = array('allslideelevent' => $slide);

			// kiem tra xem danh muc (category) co ton tai vieo khong-neu khong phai thong bao cho nguoi dung
			if($this->checkArray($video['videobycategory'])){

				$data['title'] = array('category_name' => $category_name);
				// lay 5 video duoc dang tai moi nhat cho 1 danh muc(category) dua vao category_name - phan cover
				$this->load->Model('M_Category');
				$video = $this->M_Category->getNewVideos($category_name);
				$data['listnewvideos'] = array('newvideos' => $video);

				// load video theo danh muc(category) cu the
				$this->load->Model('M_Category');
				$video = $this->M_Category->getVideoByCategoryName($category_name);
				$data['listvideobycategory'] = array('videobycategory' => $video);


				// lay 5 video duoc xem nhieu nhat cho 1 danh muc(category) dua vao category_name len sidebar
				$video = $this->M_Category->getMostViewVideos($category_name);
				$data['listmostviewvideos'] = array('mostviewvideos' => $video);

				// lay 5 video duoc xem nhieu nhat trong tat ca cac danh muc da co len sidebar
				$this->load->Model('M_Video');
				$video = $this->M_Video->getMostViewVideos();
				$data['listimpressivevideos'] = array('impressivevideos' => $video);

				$this->load->view('home/category', $data);
			}
			else{
				$this->load->view('errors/notify_errors_database.php');
			}
		}
		else{
			$this->load->view('errors/notify_errors.php');	
		}	
		$this->load->view('template/footer', $data);
	}

	public function pagination($category_name){
		// dem tong so video co category_name
		$this->load->Model('M_Category');
		$count_videos = $this->M_Category->getNumberVideosTogetherCategoryName($category_name);
	}


	public function getListVideoByRequest($category_name, $page){
		// lay trang yeu cau va ghim ten category_name
		$page = urldecode($page);
		$category_name = urldecode($category_name);

		// dem tong so video co category_name
		$this->load->Model('M_Category');
		$count_videos = $this->M_Category->getNumberVideosTogetherCategoryName($category_name);

		// lay gia tri gioi han video trong 1 trang
		$limit = $this->M_Category->getLimitValue();

		// tinh tong so trang
		$total_page = ceil($count_videos/$limit);
		$video = $this->M_Category->getListVideoByRequest($category_name, $page);
		$data['listvideobyrequest'] = array('videobyrequest' => $video,
			'current_page' => $page,
			'total_page' => $total_page);

		return $this->load->view('home/pagination_category', $data);
	}

	//
}