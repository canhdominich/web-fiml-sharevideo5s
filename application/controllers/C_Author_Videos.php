<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Author_Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function getVideoByAuthor($author){
		$author = urldecode($author);
		$author = str_replace("-", " ", $author);
		$author = trim($author);
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

		// lay tat ca slide advertisment_level = 10
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlideTen();
		$data['listallslideten'] = array('allslideten' => $slide);

		$this->load->Model('M_Video');
		// load 5 video duoc dang tai moi nhat len sidebar
		$video = $this->M_Video->getNewVideos();
		$data['listnewvideos'] = array('newvideos' => $video);

		// load 5 video duoc xem nhieu nhat len sidebar
		$video = $this->M_Video->getMostViewVideos();
		$data['listmostnewvideos'] = array('mostnewvideos' => $video);

		$flag = false;
		// neu nguoi dung dang nhap kiem tra xem tai khoan do da dang ki kenh chua?
		if(isset($_SESSION['username'])){
			$this->load->Model('M_User');
			$user_id =  $_SESSION['username'][0]['user_id'];
			$follow_user_id = $this->M_User->getIdByAuthor($author);
			if($follow_user_id > 0){
				$this->load->Model('M_Follow');
				$flag = $this->M_Follow->checkFollow($user_id, $follow_user_id);
			}
		}
			// load video by author
		$this->load->Model('M_Author_Videos');
		$video = $this->M_Author_Videos->getVideoByAuthor($author);
		$data['listvideobyauthor'] = array('videobyauthor' => $video, 'author' => $author, 'checkfollow' => $flag);
		$this->load->view('home/author_videos', $data);

		//load footer
		$this->load->view('template/footer', $data);
	}
}