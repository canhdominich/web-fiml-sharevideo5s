<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_MyVideos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		if(isset($_SESSION['username'][0]['user_id'])){
			$this->getAllVideoByUserId($_SESSION['username'][0]['user_id']);
		}
		else{
			header("Location: ".base_url()."index.php/C_Account/login");
		}
	}

     // Ham lay video by id
	public function getAllVideoByUserId($user_id){
    	// get video 
		$this->load->Model('M_Video');
		$video = $this->M_Video->getAllVideoByUserId($user_id);
		$data['listmyvideo'] = array('myvideo' => $video);
		$this->load->View('home/myvideo/myvideo.php', $data);
	}

    // Ham xoa video
	public function deleteVideo($video_id, $user_id){
    	// load video 
		$this->load->Model('M_Video');
		$flag = $this->M_Video->deleteVideo($video_id, $user_id);
		if($flag){
			header("location:".base_url()."index.php/C_MyVideos");
		}
		else{
			// message
		}
	}
}
?>