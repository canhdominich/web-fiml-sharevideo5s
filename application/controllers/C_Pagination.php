<?php
class C_Pagination extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$page = $_GET["page"];
		$page = urldecode($page);

		$category_name = $_GET["category_name"];
		$category_name = urldecode($category_name);

		$this->load->Model('M_Category');
		$limit = $this->M_Category->getLimitValue();
		$start = ($page-1)*$limit;

		$video = $this->M_Category->getListVideoByRequest($category_name, $start);
		$data['listvideobyrequest'] = array('videobyrequest' => $video);

		return $this->load->view('home/pagination_category', $data);
	}
}