<?php
/*
	우리반 전화번호부 php
	dbconnect.php
	DB연결을 위한 공통 PHP부분
	작성자: 김영길
	작성일: 2020-03-23	
 */
if(!$dbconnect = mysqli_connect('localhost','c10st03','fqnxrKJmsOUyEYmk','c10st03')){
	echo mysqli_error(); exit;
}
if(!mysqli_select_db($dbconnect,'c10st03')){
	echo mysqli_error(); exit;
}
?>
