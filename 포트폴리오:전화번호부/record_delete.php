<?php
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}
/* 레코드 번호 >>> $_GET['rowNum']  */
include './dbconnect.php';
$delete_SQL = "DELETE FROM `MEMBER_TABLE` WHERE USERNUMBER ={$_GET['rowNum']}";
$result = mysqli_query($dbconnect,$delete_SQL) or die(mysqli_error($dbconnect));
if(isset($result)){
	echo "삭제 성공 <meta http-equiv='refresh' content='0;url=./number_list.php'>";
}else {
	echo "삭제 실패";
}
?>
