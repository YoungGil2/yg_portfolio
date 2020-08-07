<?php
if(!isset($_POST['login_id']) || !isset($_POST['login_pw'])){
	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
	exit;
}
if(isset($_POST['login_button'])){
	$login_id = $_POST['login_id'];
	$login_pw = $_POST['login_pw'];
	// DB연결 PHP
	include './dbconnect.php';
	$login_sql = "SELECT * FROM `NUMBER_LIST_LOGIN`";
	$login_find = mysqli_query($dbconnect,$login_sql) or die(mysqli_error($dbconnect)); 
	$result_row = mysqli_fetch_assoc($login_find);
	if($result_row['ID'] != $login_id){
		echo "<script>alert('아이디가 잘못되었습니다.');history.back();</script>";
		exit;
	}
	if($result_row['PW'] != md5($login_pw)){
		echo "<script>alert('패스워드가 잘못되었습니다.');history.back();</script>";
		exit;
	}
	session_start();
	setcookie('login_id',$login_id,time()+(86400),'/');
	$_SESSION['login_pw'] = $result_row['ID'];
	echo '<meta http-equiv="refresh" content="0;url=./number_list.php">';
}
if(isset($_POST['not_login_button'])){
	echo '<meta http-equiv="refresh" content="0;url=./number_list.php">';
}
?>
