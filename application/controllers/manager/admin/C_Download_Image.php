<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Download_Image extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}


	public function index(){
		$listimage = array();
		$files = glob("images/*.*");
		for ($i=0; $i<count($files); $i++)
		{
			$image = $files[$i];
			array_push($listimage, $image);
		} 
		$data['listallimage'] = array('allimage' => $listimage);
		$this->load->View('manager/download_image_view.php', $data);
	}

	public function downloadImage(){
		$link = $this->input->post('link');
		$path = $this->input->post('save');

		$video_id = $this->getVideoIdOnYoutube($link);

		$title = $this->getTitleFromVideo($video_id);
		$image_name = $this->createImageName($title);

		$this->getImageFromVideo($path, $video_id, $image_name);

		$this->index();
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

    // Ham lay image tu video youtube
  public function getImageFromVideo($path, $video_id, $image_name){

	// Set path where to store thumbnails,
	// Set this to a blank string to save in the current direcrory.
  	$path_to_save_thumbnails = $path;
  	// 'D:/xampp/htdocs/Project-Educations/images/'

	// Nothing to change below this
  	$ch = curl_init();

	// Thumbnail types
  	$thubnail_types = 'hqdefault';

  	$youtube_thumb_url = 'http://img.youtube.com/vi/'.$video_id.'/'.$thubnail_types.'.jpg';

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
  		file_put_contents($path_to_save_thumbnails.$image_name.'.jpg', $image);
  	}

	// close cURL resource, and free up system resources
  	curl_close($ch);
  }
}

?>