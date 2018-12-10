<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function checkArray($video){
		$count = 0;
		$count = count($video);
		if($count != 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function loadDetail($video_id){

		// load header
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);
		$this->load->view('template/header', $data);


		// load video detail
		$this->load->Model('M_Video');
		$video = $this->M_Video->getVideoById($video_id);
		$video = array('videodetail' => $video);

		if($this->checkArray($video['videodetail'])){
		// load Model : M_Detail
		    $this->load->Model('M_Detail');

		// cap nhat so lan xem cua video
			$this->M_Detail->increaseView($video_id);

		// lay video ra
			$video = $this->M_Video->getVideoById($video_id);
			$data['loadvideodetail'] = array('videodetail' => $video);

		//lay the loai cua video
			$sub_category_id = (int) $this->M_Video->getSubCategory($video_id);

		// load 5 video cung sub_category_id voi video dang chay de goi y
		// Chu y convert tu gia tri String sang Int
			$video = $this->M_Video->getVideoBySubCategory($sub_category_id, $video_id);
			$data['listsuggestvideos'] = array('suggestvideos' => $video);

		// load toi da 6 video da xem dua vao session
			if(isset($_SESSION['video_id'])){
				$watched = array();
				foreach ($_SESSION['video_id'] as $key => $value) {
					array_unshift($watched, $value);
				}
				
				if(count($watched) >= 1){
					$watched = array_splice($watched, 0, 15);
					$video = $this->M_Detail->listVideoWatched($watched);
					$data['listvideowatched'] = array('videowatched' => $video);
				}
				else{
					$video = $this->M_Detail->listRandomVideo();
					$data['listvideowatched'] = array('videowatched' => $video);
				}
			}
			else{
				$video = $this->M_Detail->listRandomVideo();
				$data['listvideowatched'] = array('videowatched' => $video);
			}

			$this->load->view('home/detail', $data);
		}
		else{
			$this->load->view('errors/notify_errors_database.php');
		}
		$this->load->view('template/footer');
	}
}

?>