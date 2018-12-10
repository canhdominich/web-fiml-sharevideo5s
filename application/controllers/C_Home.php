<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		// load video post cover
		$this->load->Model('M_Video');
		$video = $this->M_Video->getVideosCover();
		$data['listvideocover'] = array('videocover' => $video);

		// lay tat ca slide advertisment_level = 0
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlide();
		$data['listallslide'] = array('allslide' => $slide);

		// lay tat ca slide advertisment_level = 1 len sidebar
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlideOne();
		$data['listallslideone'] = array('allslideone' => $slide);

		// load video da post
		$video = $this->M_Video->getAllVideo();
		$data['listpostvideo'] = array('postvideo' => $video);

		// load 10 video duoc dang tai moi nhat len sidebar
		$video = $this->M_Video->getNewVideos();
		$data['listnewvideos'] = array('newvideos' => $video);

		// load 10 video duoc xem nhieu nhat len sidebar
		$video = $this->M_Video->getMostViewVideos();
		$data['listmostnewvideos'] = array('mostnewvideos' => $video);



		// lay video theo tung danh muc (category)
		$video = $this->M_Video->getVideoByCategory();
		$data['listvideogeybycategory'] = array('videogeybycategory' => $video);

		// Lay video dua tren tai khoan da dang ky theo kenh
		if(isset($_SESSION['username'])){
			$video = $this->M_Video->getVideoByFollowUserId($_SESSION['username'][0]['user_id']);
			if(count($video) > 0){
				$data['listvideofollow'] = array('videofollow' => $video);
			}
		}

		$this->load->view('template/header');
		$this->load->view('home/index',$data);
		$this->load->view('template/footer');
	}


	public function loadDetail($video_id = 0){

		// load header
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		// load video detail
		$this->load->Model('M_Video');
		$video = $this->M_Video->getVideoById($video_id);
		$data['loadvideodetail'] = array('videodetail' => $video);
		$this->load->helper('url');

		//lay the loai cua video
		$sub_category_id = (int) $this->M_Video->getSubCategory($video_id);

		// load 5 video cung sub_category_id voi video dang chay de goi y
		// Chu y convert tu gia tri String sang Int
		$video = $this->M_Video->getVideoBySubCategory($sub_category_id, $video_id);
		$data['listsuggestvideos'] = array('suggestvideos' => $video);



		$this->load->view('template/header', $data);
		$this->load->view('home/detail', $data);
		$this->load->view('template/footer');
	}
}

?>