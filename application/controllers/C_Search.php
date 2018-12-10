<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	// search ajax
	public function searchVideo($key){
		$this->load->Model('M_Video');
		$key = urldecode($key);
		$key = trim($key);
		$video = $this->M_Video->findVideoByName($key);
		// lay ket qua va tu khoa luu vao mang
		$search['listsearchvideo'] = array('searchvideo' => $video,
										   'key' => $key);
		$key = "";
		return $this->load->View('template/search_ajax.php', $search);
	}

	// ho tro search ajax khi nhan vao xem them
	public function searchListVideoByKey($key){
		$key = trim($key);
		$this->load->Model('M_Video');
		$video = $this->M_Video->findVideoByName($key);
		$data['resultlistvideo'] = array('listvideo' => $video,
											'key' => $key);

		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);
		$this->load->view('template/header');

		// load 10 video duoc dang tai moi nhat len sidebar
		$video = $this->M_Video->getNewVideos();
		$data['listnewvideos'] = array('newvideos' => $video);

		// load 10 video duoc xem nhieu nhat len sidebar
		$video = $this->M_Video->getMostViewVideos();
		$data['listmostnewvideos'] = array('mostnewvideos' => $video);

		$this->load->View('home/search.php', $data);
		$this->load->view('template/footer', $data);
	}


	// search thuong
	// search list video and loaded page lan dau
	public function searchListVideo(){
		$key = $this->input->get('search_query');
		$key = trim($key);
		$this->load->Model('M_Video');
		$video = $this->M_Video->searchListVideo($key);
		$data['resultlistvideo'] = array('listvideo' => $video,
											'key' => $key);

		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);
		$this->load->view('template/header');

		// load 10 video duoc dang tai moi nhat len sidebar
		$video = $this->M_Video->getNewVideos();
		$data['listnewvideos'] = array('newvideos' => $video);

		// load 10 video duoc xem nhieu nhat len sidebar
		$video = $this->M_Video->getMostViewVideos();
		$data['listmostnewvideos'] = array('mostnewvideos' => $video);

		// lay tat ca slide advertisment_level = 1 len sidebar
		$this->load->Model('M_Slide');
		$slide = $this->M_Slide->getAllSlideOne();
		$data['listallslideone'] = array('allslideone' => $slide);

		$this->load->View('home/search.php', $data);
		$this->load->view('template/footer', $data);
	}

	// search list video nhung khong loaded page sau khi da load page lan dau 
	public function searchVideoByName(){
		$page = $_GET["page"];
		$page = urldecode($page);

		$key = $_GET["key"];
		$key = urldecode($key);

		$this->load->Model('M_Video');
		$limit = $this->M_Video->getLimitValue();

		$start = ($page-1)*$limit;

		$video = $this->M_Video->searchVideoByName($key, $start);
		$data['resultlistvideo'] = array('listvideo' => $video);											

		$this->load->View('home/pagination_search.php', $data);
	}
}
