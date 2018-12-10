<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Admin_Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		if(isset($_SESSION['username'])){
			// load video 
			$this->load->Model('M_Video');
			$video = $this->M_Video->getAllData();
			$data['listallvideo'] = array('allvideo' => $video);

		// lay all ten subcategory phuc vu phan them subcategory
			$this->load->Model('M_SubCategory');
			$video = $this->M_SubCategory->getAllSubCategory();
			$data['listallsubcategory'] = array('allsubcategory' => $video);
			
		// $this->load->view('manager/header_view');
			$this->load->View('manager/admin/videos_view.php', $data);
		// $this->load->view('template/footer', $data);
		}
		else{
			header("Location: ".base_url()."index.php/view/login");
		}
		
	}

	public function insertVideo(){
		// // Xu ly upload anh
		// if ($_FILES['image']["name"]) {
		// 	$target_dir="images/";
		// 	$target_file = $target_dir . basename($_FILES["image"]["name"]);
		// 	$uploadOk=1;

		// 	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

		// 	if (isset($_POST['submit'])) {
		// 		$check = getimagesize($_FILES["image"]["tmp_name"]);
		// 		if ($check!=false) {
		// 			$uploadOk=1;
		// 		}else{
		// 			$uploadOk=0;
		// 			$this->index();
		// 		}
		// 	}
		// 	if ($_FILES["image"]["size"] > 50000000) {
		// 		$uploadOk=0;
		// 		$this->index();
		// 	}
		// 	if ($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jpeg" && $imageFileType!="gif") {
		// 		$uploadOk=0;
		// 		$this->index();
		// 	}
		// 	if ($uploadOk==0) {
		// 		$this->index();
		// 	}else{
		// 		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

		// 		} else {
		// 			$this->index();
		// 		}
		// 	}

		// 	$image = "images/".basename($_FILES["image"]["name"]);
		// }else{
		// 	$image = "images/noavatar.png";
		// }

		if(isset($_SESSION['username'])){
		// Tao video_id
			$this->load->Model('M_Video');
			$video_id = $this->M_Video->createVideoId();

			$sub_category_id = $this->input->post('sub_category_id');
			$link = $this->convertLink($this->input->post('link'));

		//lay videoid youtube
			$videoid = $this->getVideoIdOnYoutube($this->input->post('link'));

		// $image = $_FILES['image']["name"];
			$image = $this->getLinkImageFromVideo($videoid);

		// lay do dai thoi gian cua 1 video
			$limit_time = $this->youtubeVideoInfo($videoid);
			$limit_time = $this->formatDurationVideo($limit_time);
		// end

			$title = $this->getTitleFromVideo($videoid);

			$descriptions = $this->input->post('descriptions');
			$date = date("Y-m-d");
			$author = $_SESSION['username'][0]['author'];
			$user_id = $_SESSION['username'][0]['user_id'];
			$views = 200;
			$status = $this->input->post('status');

		// them vao bang video
			$this->load->Model('M_Video');
			$flag = $this->M_Video->insertVideo($video_id, $sub_category_id, $title, $link, $image, $limit_time,$descriptions, $date, $author, $user_id, $views, $status);

			if($flag){
				header("location:".base_url()."index.php/manager/admin/system");
			}
			else{
			// message
			}
		}
		else{
			header("Location: ".base_url()."index.php/view/login");
		}
		
	}

	// Ham chuyen doi link youtube sang embed link 
	public function convertLink($url){
		return str_replace("watch?v=", "embed/", $url);
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


     // Ham lay video by id
    public function getVideoById($video_id){
    	// get video 
    	$this->load->Model('M_Video');
    	$video = $this->M_Video->getVideoById($video_id);
    	$data['getvideo'] = array('video' => $video);
    	$this->load->View('manager/admin/updatevideo_view.php', $data);
    }

    // Ham lay tieu de video tu youtube
    public function getTitleFromVideo($video_id) {
      $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $video_id . '&format=json'); //get JSON video details
      $details = json_decode($json, true); //parse the JSON into an array
      return $details['title']; //return the video title
  }

  public function getLinkImageFromVideo($video_id) {
      $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $video_id . '&format=json'); //get JSON video details
      $details = json_decode($json, true); //parse the JSON into an array
      return $details['thumbnail_url']; //return the link image
  }

  	// Tao ten file anh dung ham bam md5 bam tu title video
  public function createImageName($title){
  	return md5($title);
  }

    // Ham lay image tu video youtube
  public function getImageFromVideo($video_id, $image_name){

	// Set path where to store thumbnails,
	// Set this to a blank string to save in the current direcrory.
  	$path_to_save_thumbnails = 'D:/xampp/htdocs/image/';

	// Nothing to change below this
  	$ch = curl_init();

	// Thumbnail types
  	$thubnail_types = 'hqdefault';

  	$youtube_thumb_url = 'http://img.youtube.com/vi/'.$video_id.'/'.$image_name.'.jpg';

    // set URL and other appropriate options
  	curl_setopt($ch, CURLOPT_URL, $youtube_thumb_url);
  	curl_setopt($ch, CURLOPT_HEADER, 0);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  	$image = curl_exec($ch);
  	$info = curl_getinfo($ch);

    // If image is found than save it to a file.
  	if($info['http_code'] == 200) {
        // Store thumbnails in the given directory, change this
        // to your liking.
  		file_put_contents($path_to_save_thumbnails.'hqdefault'.'.jpg', $image);
  	}

  	echo 'Done downloading.';

// close cURL resource, and free up system resources
  	curl_close($ch);
  }

    // Ham update video
  public function updateVideo($video_id){
    // Xu ly upload anh
  	// if ($_FILES['image']["name"]) {
  	// 	$target_dir="images/";
  	// 	$target_file = $target_dir . basename($_FILES["image"]["name"]);
  	// 	$uploadOk=1;

  	// 	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

  	// 	if (isset($_POST['submit'])) {
  	// 		$check = getimagesize($_FILES["image"]["tmp_name"]);
  	// 		if ($check!=false) {
  	// 			echo "File is an image - " . $check["mime"] . ".";
  	// 			$uploadOk=1;
  	// 		}else{
  	// 			echo "File is not image";
  	// 			$uploadOk=0;
  	// 		}
  	// 	}
  	// 	if ($_FILES["image"]["size"] > 50000000) {
  	// 		echo 'Sorry your file is too large';
  	// 		$uploadOk=0;
  	// 	}
  	// 	if ($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jpeg" && $imageFileType!="gif") {
  	// 		echo "<h2>Chỉ chấp nhận file ảnh</h2><br/>";
  	// 		$uploadOk=0;
  	// 	}
  	// 	if ($uploadOk==0) {
  	// 		echo 'ERROR: file chưa upload thành công';
  	// 	}else{
  	// 		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

  	// 		} else {
  	// 			echo 'Sorry, there was an error uploading your file';
  	// 		}
  	// 	}
  	// 	$image = "images/".basename($_FILES["image"]["name"]);
  	// }else{
  	// 	$image = "images/noavatar.png";
  	// }

  	$title = $this->input->post('title');
  	$link = $this->convertLink($this->input->post('link'));
  	// $image = $_FILES['image']["name"];

	// lay do dai thoi gian cua 1 video
  	$videoid = $this->getVideoIdOnYoutube($this->input->post('link'));
  	$limit_time = $this->youtubeVideoInfo($videoid);
  	$limit_time = $this->formatDurationVideo($limit_time);
  	$image = $this->getLinkImageFromVideo($videoid);
	// end

  	$descriptions = $this->input->post('descriptions');
  	$status = $this->input->post('status');

		// them vao bang video
  	$this->load->Model('M_Video');
  	$flag = $this->M_Video->updateVideo($video_id, $title, $link, $image, $limit_time, $description, $status);

  	if($flag){
  		header("location:".base_url()."index.php/manager/admin/system");
  	}
  	else{
			// message
  	}
  }

   // Ham xoa video
  public function deleteVideoById($video_id){
    	// load video 
  	$this->load->Model('M_Video');
  	$flag = $this->M_Video->deleteVideoById($video_id);
  	if($flag){
  		header("location:".base_url()."index.php/manager/admin/system");
  	}
  	else{
			// message
  	}
  }

  public function uploadVideo($video_id){
  	$this->load->Model('M_ShareVideo');
  	$video = $this->M_ShareVideo->getLinkVideoById($video_id);
  	$data['infovideo'] = array('info' => $video);

    // lay all ten subcategory phuc vu phan them subcategory
  	$this->load->Model('M_SubCategory');
  	$video = $this->M_SubCategory->getAllSubCategory();
  	$data['listallsubcategory'] = array('allsubcategory' => $video);

  	// set starus video = 2
  	$this->M_ShareVideo->updateStatusTwoLinkVideoById($video_id);

  	$this->load->View('manager/admin/video_upload.php', $data);
  }


  public function conductUploadVideo(){

  	if(isset($_SESSION['username'])){
    // Tao video_id
  		$this->load->Model('M_Video');
  		$video_id = $this->M_Video->createVideoId();

  		$sub_category_id = $this->input->post('sub_category_id');
  		$link = $this->convertLink($this->input->post('link'));

    //lay videoid youtube
  		$videoid = $this->getVideoIdOnYoutube($this->input->post('link'));

    // $image = $_FILES['image']["name"];
  		$image = $this->getLinkImageFromVideo($videoid);

    // lay do dai thoi gian cua 1 video
  		$limit_time = $this->youtubeVideoInfo($videoid);
  		$limit_time = $this->formatDurationVideo($limit_time);
    // end

  		$title = $this->getTitleFromVideo($videoid);

  		$descriptions = $this->input->post('descriptions');
  		$date = $this->input->post('date');

  		$user_id = $this->input->post('user_id');

  		$this->load->Model('M_User');
  		$author = $this->input->post('author');
  		$data = $this->M_User->getAuthorById($user_id);
  		$author = $data[0]['author'];

  		$views = 200;
  		$status = $this->input->post('status');

    // them vao bang video
  		$this->load->Model('M_Video');
  		$flag = $this->M_Video->insertVideo($video_id, $sub_category_id, $title, $link, $image, $limit_time,$descriptions, $date, $author, $user_id, $views, $status);

  		if($flag){
  			header("location:".base_url()."index.php/manager/admin/system");
  		}
  		else{
        // message
  		}
  	}
  	else{
  		header("Location: ".base_url()."index.php/view/login");
  	}
  }
}
?>