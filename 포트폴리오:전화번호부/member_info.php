<?
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
//	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<style>
			*{margin: 0px; padding: 0px;}
			.member_info_box {
			}
			.member_img {
				width: 80%;
				height: 300px;
				margin: 10px auto;
			}
			img {
				width: 100%;
				height: 100%;
				object-fit: cover;
			}
			.info_title , .info_content {
				float: left;
			}
			.info_title {
				text-align: center;
				width: 120px;
				height: 30px;
				margin-left: 30px;
			}
			.info_content {
				width: 300px;
				height: 30px;
				text-indent: 10px;
			}
			.back_color {
				background-color: #f3f3f3;
			}
		</style>
	</head>
	<body>
<?
/* 레코드 번호 >>> $_GET['rowNum']  */
include './dbconnect.php';
$select_SQL = "SELECT * FROM `MEMBER_TABLE` WHERE USERNUMBER ='{$_GET['rowNum']}'";
$result = mysqli_query($dbconnect,$select_SQL) or die(mysqli_error($dbconnect)); 
$row = mysqli_fetch_assoc($result);
?>
		<div class="member_info_box">
			<div class="member_img"><? echo "<img src=./img/{$row['IMG_TMP_NAME']}>"; ?></div>
			<p class="info_title">성 </p> <p class="info_content"><? echo "{$row['LAST_NAME']}"; ?></p>
			<p class="info_title back_color">이름 </p> <p class="info_content back_color"> <? echo "{$row['FIRST_NAME']}"; ?></p>
			<p class="info_title">휴대폰 번호 1 </p> <p class="info_content"><? echo "{$row['PHONE_NUMBER']}"; ?></p>
			<p class="info_title back_color">휴대폰 번호 2 </p> <p class="info_content back_color"><? echo "{$row['SECOND_PHONE_NUMBER']}"; ?></p>
			<p class="info_title">성별 </p> <p class="info_content"><? echo "{$row['GENDER']}"; ?></p>
			<p class="info_title back_color">주소 </p> <p class="info_content back_color"><? echo "{$row['ADDRESS']}"; ?></p>
			<p class="info_title">생년월일 </p> <p class="info_content"><? echo "{$row['BIRTHDAY']}"; ?></p>
			<p class="info_title back_color">이메일 </p> <p class="info_content back_color"><? echo "{$row['EMAIL']}"; ?></p>
			<p class="info_title">메모 </p> <p class="info_content"><? echo "{$row['MEMO']}"; ?></p>
			<p class="info_title"></p>
		</div>
		
	</body>
</html>



