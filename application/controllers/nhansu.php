<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'UploadHandler.php';
class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		$ketqua = array('mangketqua' => $ketqua );
		$this->load->view('nhansu_view', $ketqua);
	}

	public function sua_nhansu($idreceiver)
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getDataById($idreceiver);
		$ketqua = array('dulieukq' => $ketqua);
		$this->load->view('sua_nhansu_view', $ketqua);	
	}

	public function update_nhansu()
	{
		$id = $this->input->post('id');
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$phonenum = $this->input->post('phonenum');
		$linkfb = $this->input->post('linkfb');

		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// // Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		// if ($_FILES["anh"]["size"] > 500000) {
		//   echo "Sorry, your file is too large.";
		//   $uploadOk = 0;
		// }

		// // Allow certain file formats
		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		//   echo "Chỉ cho phép upload file ảnh.";
		//   $uploadOk = 0;
		// }

		// // Check if $uploadOk is set to 0 by an error
		// if ($uploadOk == 0) {
		//   echo "Chưa upload được.";
		// // if everything is ok, try to upload file
		// } else {
		//   if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		//     echo "The file ". htmlspecialchars( basename( $_FILES["anh"]["name"])). " has been uploaded.";
		//   } else {
		//     echo "Sorry, there was an error uploading your file.";
		//   }
		// }

		$avatar = basename($_FILES["anh"]["name"]);

		if ($avatar) {
			$avatar =  base_url().  "Fileupload/". basename($_FILES["anh"]["name"]);
		}
		else{
			$avatar = $this->input->post('anh2');
		}
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->updateById($id,$ten,$tuoi,$phonenum,$avatar,$linkfb,$sodonhang);
		if ($trangthai) {
			$this->load->view('Success');
		}
		else{
			echo "Thất bại nhá";
		}

	}

	public function xoa_nhansu($idreceiver)
	{
		
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->RemoveDataById($idreceiver);
		if($trangthai){
			$this->load->view('Success');
		}
		else
		{
			echo "Xóa thất bại";
		}

	}

	public function nhansu_add()
	{
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// // Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["anh"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Chỉ cho phép upload file ảnh.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Chưa upload được.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["anh"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}

		$anhavatar =  base_url().  "Fileupload/". basename($_FILES["anh"]["name"]);
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$phonenum = $this->input->post('phonenum');
		$linkfb = $this->input->post('linkfb');

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertData($anhavatar,$ten,$tuoi,$phonenum,$sodonhang,$linkfb);
		if($trangthai){
			$this->load->view('Success');
		}
		else{
			echo "Insert false";
		}
	}

	public function ajax_add()
	{
		$anhavatar =  "http://localhost:8889/project2/Fileupload/anh-gai-xinh-toc-ngan.jpg";
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$phonenum = $this->input->post('phonenum');
		$linkfb = $this->input->post('linkfb');

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertData($anhavatar,$ten,$tuoi,$phonenum,$sodonhang,$linkfb);
		if($trangthai){
			$this->load->view('Success');
		}
		else{
			echo "Insert false";
		}
	}
	public function uploadfile()
	{
		$uploadfile = new UploadHandler;
	}
}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */