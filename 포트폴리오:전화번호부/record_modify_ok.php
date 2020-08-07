<?php
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_phonenumber = $_POST['user_phonenumber'];
$user_secondphonenumber = $_POST['user_secondphonenumber'];
if($_POST['user_gender'] == '남자'){
	$user_gender = "남자";
}else {
	$user_gender = "여자";
}
$user_address = $_POST['user_address'];
$user_birthday = $_POST['user_dirthday'];
$user_email = $_POST['user_email'];
$user_memo = $_POST['user_memo'];
$target_file = basename($_FILES["user_img_file"]["name"]);
if($target_file ==! null){
	// 업로드 될 폴더 경로
	$target_dir = "./img/";
	$upload_OK = 1;
	// 데이터 베이스에 업로드될 파일명
	$target_file = basename($_FILES["user_img_file"]["name"]);
	// 데이터 베이스에 업로될 템프네임
	$target_file_tmp_name = $user_phonenumber.basename($_FILES["user_img_file"]["tmp_name"].'.'.basename($_FILES["user_img_file"]["type"]));
	// 폴더명과 파일명(경로)
	$target_dir_file = $target_dir.basename($_FILES["user_img_file"]["name"]);
	// 이미지 파일이 맞는지 확인
	$check_file = getimagesize($_FILES["user_img_file"]["tmp_name"]);
	// 이미지 파일 타입
	$target_file_type =  pathinfo($target_dir_file, PATHINFO_EXTENSION);
	// 파일 업로드 검사
	if($check_file != false){
		echo "File is an image - " . $check["mime"] . ".";
		$upload_OK = 1;
	}else {
		echo "File is not an image.";
		$upload_OK = 0;
	}
	if(file_exists($target_dir_file)){
		echo "Sorry, file already exists.";
		$upload_OK = 0;
	}
	if($_FILES["user_img_file"]["size"] > 100000000){
		echo "Sorry, your file is too large.";
		$upload_OK = 0;
	}
	if($target_file_type != "jpg" && $target_file_type != "png" && $target_file_type != "jpeg" && $target_file_type != "gif"){
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$upload_OK = 0;
	}
	if($upload_OK == 0){
		echo "Sorry, your file was not uploaded.";
	}
	else {
		$target_file_upload_tmp_name = $target_dir.$user_phonenumber.basename($_FILES["user_img_file"]["tmp_name"].'.'.basename($_FILES["user_img_file"]["type"]));
		if(move_uploaded_file($_FILES["user_img_file"]["tmp_name"], $target_file_upload_tmp_name)){
			echo "The file ". basename( $_FILES["user_img_file"]["name"]). " has been uploaded.";
			echo "폴더 입력 완료";
		}else {
			echo "Sorry, there was an error uploading your file.";
			echo "수정 실패";
		}
	}
	// DB 연결
	include './dbconnect.php';
	$update_SQL = "UPDATE `MEMBER_TABLE` SET FIRST_NAME='$user_firstname', LAST_NAME='$user_lastname', PHONE_NUMBER='$user_phonenumber', SECOND_PHONE_NUMBER='$user_secondphonenumber', GENDER='$user_gender', ADDRESS='$user_address', BIRTHDAY='$user_birthday', EMAIL='$user_email', MEMO='$user_memo', IMG_URL='$target_file', IMG_TMP_NAME='$target_file_tmp_name' WHERE USERNUMBER = {$_GET['rowNum']}";
	$result = mysqli_query($dbconnect,$update_SQL) or die(mysqli_error($dbconnect));
	if(isset($result)){
		echo "$update_SQL.수정 성공 <meta http-equiv='refresh' content='0;url=./number_list.php'>";
	}else {
		echo "수정 실패";
	}

}else {
	// DB 연결
	include './dbconnect.php';
	$update_SQL = "UPDATE `MEMBER_TABLE` SET FIRST_NAME='$user_firstname', LAST_NAME='$user_lastname', PHONE_NUMBER='$user_phonenumber', SECOND_PHONE_NUMBER='$user_secondphonenumber', GENDER='$user_gender', ADDRESS='$user_address', BIRTHDAY='$user_birthday', EMAIL='$user_email', MEMO='$user_memo' WHERE USERNUMBER = {$_GET['rowNum']}";
	echo "$update_SQL.수정 성공 <meta http-equiv='refresh' content='0;url=./number_list.php'>";
	}
?>
