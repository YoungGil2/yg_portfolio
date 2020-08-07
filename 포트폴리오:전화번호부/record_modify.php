<?php
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<link href="./css/admin_page.css" rel="stylesheet" type="text/css">
		<title>수정 페이지</title>
	</head>
	<body>
<?php
// DB연결
include './dbconnect.php';
// 레코드 번호 >> $_GET['rowNum']
$loadSQL = "SELECT * FROM `MEMBER_TABLE` WHERE USERNUMBER={$_GET['rowNum']}";
$loadrow = mysqli_query($dbconnect,$loadSQL) or die(mysqli_error($dbconnect));
$result_row = mysqli_fetch_assoc($loadrow);
echo "
		<div class='content_box'>
			<section>
				<article>
					<form action='./record_modify_ok.php?rowNum={$_GET['rowNum']}' method='post' enctype='multipart/form-data'>";
				echo'
						<ul class="user_profile">
							<li class="user_img_box">
								<h1>Profile</h1>
								<div id="user_img" class="user_img"></div>
								<input type="file" name="user_img_file" class="user_img_file" >
							</li>
							<li>
								<div class="user_profile_information">
									<div class="user_profile_information_firstname_box">
										<p>First Name</p>
										<input type="text" name="user_firstname" id="information_firstname" class="information_firstname" >
									</div>
									<div class="user_profile_information_lastname_box">
										<p>Last Name</p>
										<input type="text" name="user_lastname" id="information_lastname" class="information_firstname" placeholder="성씨를 입력하세요.">
									</div>
									<div class="user_profile_information_phonenumber_box">
										<div>
											<p>Phone number</p>
											<input type="text" name="user_phonenumber" id="information_phonenumber" class="information_phonenumber">
										</div>
										<div class="secondphonenumber_box">
											<p>Second Phone number</p>
											<input type="text" name="user_secondphonenumber" id="information_secondphonenumber" class="information_secondphonenumber">
										</div>
									</div>
									<div class="user_profile_information_gender_box">
										<p>Gender</p>
										남자 <input type="radio" name="user_gender" id="information_gender_man" class="information_gender" name="gender" value="남자">
										여자 <input type="radio" name="user_gender" id="information_gender_woman" class="information_gender" name="gender" value="여자">
									</div>
									<div class="user_profile_information_address_box">
										<p>Address</p>
										<input type="text" name="user_address" id="information_address" class="information_address">
									</div>
									<div class="user_profile_information_dirthday_box">
										<p>Birthday</p>
										<input type="date" name="user_dirthday" id="information_birthday" class="information_birthday">
									</div>
									<div class="user_profile_information_email_box">
										<p>E-mail</p>
										<input type="email" name="user_email" id="information_email" class="information_email">
									</div>
									<div class="user_profile_information_detail_box">
										<p>Memo</p>
										<input type="text" name="user_memo" id="information_detail" class="information_detail">
									</div>
									<input type="submit" value="연락처 수정" name="user_modify_button" class="information_modify_button">
								</div>
							</li>
						</ul>
					</form>
				</article>
			</section>
		</div>
';
echo "<script>
	document.getElementById('user_img').innerHTML = '<img src=./img/{$result_row['IMG_TMP_NAME']} class=\"user_img_src\">';
	document.getElementById('information_firstname').value = '{$result_row['FIRST_NAME']}';
	document.getElementById('information_lastname').value = '{$result_row['LAST_NAME']}';
	document.getElementById('information_phonenumber').value = '{$result_row['PHONE_NUMBER']}';
	document.getElementById('information_secondphonenumber').value = '{$result_row['SECOND_PHONE_NUMBER']}';
	if('{$result_row['GENDER']}' == '남자'){
		document.getElementById('information_gender_man').checked = true;
	}else {
		document.getElementById('information_gender_woman').checked = true;
	}
	document.getElementById('information_address').value = '{$result_row['ADDRESS']}';
	document.getElementById('information_birthday').value = '{$result_row['BIRTHDAY']}';
	document.getElementById('information_email').value = '{$result_row['EMAIL']}';
	document.getElementById('information_detail').value = '{$result_row['MEMO']}';
	let reader = new FileReader();
			reader.onload = (readerevent) => {
				document.querySelector('.user_img_src').setAttribute('src',readerevent.target.result);
			};
			document.querySelector('.user_img_file').addEventListener('change',(changeevent) =>{
				let imgfile = changeevent.target.files[0];
				reader.readAsDataURL(imgfile);
			});
</script>";
?>
	</body>
</html>
