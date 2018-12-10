<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_ShareVideo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		if(!isset($_SESSION['username'])){
			header("Location: ".base_url()."index.php/C_NotifyErrors/statusAccount");
		}
		else{
			header("Location: ".base_url()."index.php/C_ShareVideo/shareVideo");
		}
	}

	public function shareVideo(){
		// load header + category cua footer
		$this->load->Model('M_Header');
		$menu = $this->M_Header->loadMenu();
		$data['menu'] = array('listmenu' => $menu);

		$this->load->view('template/header');
		$this->load->view('home/sharevideo.php');	
		$this->load->view('template/footer', $data);
	}

	public function regexLink(){
		$link = $this->input->post('link');
		$pattern = '/(https?:\/\/)?(www\.)?(youtube\.com)\/watch\?v=([a-zA-Z0-9_-]+)[^\s]*/im';
		if(preg_match_all($pattern, $link, $matches)){
			return $link;
		}
		else{
			return $link = "";
		}
	}

		// add link video
	public function insertLinkVideo(){
		$link = $this->regexLink();
		if($link == null || $link == ""){
			header("Location: ".base_url()."index.php/C_NotifyErrors/shareUnSuccessfully");
		}
		else{
			$user_id = $_SESSION['username'][0]['user_id'];
			$create_date = date("Y-m-d");
			$status = 0;

			$this->load->Model('M_ShareVideo');
			$flag = $this->M_ShareVideo->insertLinkVideo($link, $user_id, $create_date, $status);
			if($flag){
				header("Location: ".base_url()."index.php/C_NotifyErrors/shareSuccessfully");
			}
			else{
				header("Location: ".base_url()."index.php/C_NotifyErrors/shareUnSuccessfully");
			}
		}
	}

	public function getAllLinkVideo(){
		$this->load->Model('M_ShareVideo');
		$link = $this->M_ShareVideo->getAllLinkVideo();
		$data['listlink'] = array('link' => $link);
		$this->load->View('manager/sharevideo_view.php', $data);
	}

	public function getAllLinkVideoAgreed(){
		$this->load->Model('M_ShareVideo');
		$link = $this->M_ShareVideo->getAllLinkVideoAgreed();
		$data['listlink'] = array('link' => $link);
		$this->load->View('manager/sharevideo_view.php', $data);
	}

	public function getAllLinkVideoUnAgreed(){
		$this->load->Model('M_ShareVideo');
		$link = $this->M_ShareVideo->getAllLinkVideoUnAgreed();
		$data['listlink'] = array('link' => $link);
		$this->load->View('manager/sharevideo_view.php', $data);
	}

	public function getLinkNameVideoById($video_id){
		$this->load->Model('M_ShareVideo');
		$link = $this->M_ShareVideo->getLinkNameVideoById($video_id);
		$data['linkname'] = array('link' => $link);
	}

	public function deleteLinkVideoById($video_id){
		$this->load->Model('M_ShareVideo');
		$flag = $this->M_ShareVideo->deleteLinkVideoById($video_id);
		if($flag){
			header("Location: ".base_url()."index.php/manager/linkvideo");
		}
		else{

		}
	}

	public function videoApproval($video_id){
		$this->load->Model('M_ShareVideo');
		$flag = $this->M_ShareVideo->updateStatusOneLinkVideoById($video_id);
		if($flag){
			header("Location: ".base_url()."index.php/manager/linkvideo");
		}
		else{

		}
	}

	public function videoUnapproval($video_id){
		$this->load->Model('M_ShareVideo');
		$flag = $this->M_ShareVideo->updateStatusZeroLinkVideoById($video_id);
		if($flag){
			header("Location: ".base_url()."index.php/manager/linkvideo");
		}
		else{

		}
	}

	// Ham lay video id tren youtube
	public function getVideoIdOnYoutube($url){
		$parts = parse_url($url);
		if(isset($parts['query'])){
			parse_str($parts['query'], $qs);
			if(isset($qs['v'])){
				return $qs['v'];
			}else if(isset($qs['vi'])){
				return $qs['vi'];
			}
		}
		if(isset($parts['path'])){
			$path = explode('/', trim($parts['path'], '/'));
			return $path[count($path)-1];
		}
		return "errors";
	}

	// Ham lay do dai thoi gian cua 1 video tren youtube dua tren API
	public function youtubeVideoInfo($video_id) {

		$url = 'https://www.googleapis.com/youtube/v3/videos?id='.$video_id.'&key=AIzaSyDYwPzLevXauI-kTSVXTLroLyHEONuF9Rw&part=snippet,contentDetails';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);
        //print_t($response_a); if you want to get all video details
        return  $response_a->items[0]->contentDetails->duration; //get video duaration
    }

    // Ham convert video duration
    public function formatDurationVideo($duration){
    	$durationvideo =  new DateInterval($duration);
    	return $durationvideo->format('%H:%I:%S');
    }

    // Ham lay tieu de video tu youtube
    public function getTitleFromVideo($video_id) {
      $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $video_id . '&format=json'); //get JSON video details
      $details = json_decode($json, true); //parse the JSON into an array
      return $details['title']; //return the video title
  }

  	// Tao ten file anh dung ham bam md5 bam tu title video
  public function createImageName($title){
  	return md5($title);
  }

}
?>