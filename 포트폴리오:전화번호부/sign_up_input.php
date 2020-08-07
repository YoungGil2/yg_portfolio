<?php
include './dbconnect.php';
$sign_id = $_POST['sign_in_ID'];
$sign_pw = $_POST['sign_in_PW'];
$sign_pw_check = $_POST['sign_in_PW_check'];
$sign_name = $_POST['sign_in_name'];
if($_POST['sign_in_gender'] == '남자'){
	@$sign_gender = "남자";
}else {
	@$sign_gender = "여자";
}
$sign_phonenumber = $_POST['sign_in_phonenumber'];
$sign_phonenumber_hyphen_delete = str_replace("-","",$sign_phonenumber);
$sign_email = $_POST['sign_in_email'];
if($sign_pw == $sign_pw_check){
	$result_sign_pw = $sign_pw_check;
}else {
	echo "<script>alert('죄송합니다. 비밀번호와 비밀번호 확인 맞지않아 회원가입이 원활히 되지 않았습니다.');</script>";
}
if($sign_id == " "){
	echo "<script>alert('공백이 존재합니다.') history.back();</script>";
}
echo @$result_sign_pw;
if(isset($result_sign_pw)){
	// DB 연결 
	
	$input_SQL = "INSERT INTO `ADMIN_USER_TABLE` (ADMIN_ID, ADMIN_PW, ADMIN_NAME, ADMIN_GENDER, ADMIN_PHONENUMBER, ADMIN_EMAIL) VALUES ('".$sign_id."', '".$sign_pw."','".$sign_name."', '".$sign_gender."', '".$sign_phonenumber_hyphen_delete."', '".$sign_email."')";

	$db_input = mysqli_query($dbconnect,$input_SQL);
	if(!$db_input){
		echo  "데이터베이스 입력 실패".mysqli_error($dbconnect);
	}
	//echo '<meta http-equiv="refresh" content="0;url=./login.html">';
}
?>
