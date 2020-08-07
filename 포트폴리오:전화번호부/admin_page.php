<?php
//로그인 쿠기 세션 확인
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<link href="./css/admin_page.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<title>관리자 페이지</title>
	</head>
	<body>
		<div class="content_box">
			<section>
				<article>
					<form action="./number_list.php" method="post" enctype="multipart/form-data">
						<ul class="user_profile">
							<li class="user_img_box">
								<h1>Profile</h1>
								<div class="user_img">
									<img src="./img/normal.jpg" class="user_img_src">
								</div>
								<input type="file" name="user_img_file" class="user_img_file">
							</li>
							<li>
								<div class="user_profile_information">
									<div class="user_profile_information_firstname_box">
										<p>First Name</p>
										<input type="text" name="user_firstname" id="information_firstname" class="information_firstname" placeholder="이름을 입력하세요.">
									</div>
									<div class="user_profile_information_lastname_box">
										<p>Last Name</p>
										<input type="text" name="user_lastname" id="information_firstname" class="information_firstname" placeholder="성씨를 입력하세요.">
									</div>
									<div class="user_profile_information_phonenumber_box">
										<div>
											<p>Phone number</p>
											<input type="text" name="user_phonenumber" id="information_phonenumber" class="information_phonenumber">
										</div>
										<div class="secondphonenumber_box">
											<p>Second Phone number</p>
											<input type="text" name="user_secondphonenumber" id="user_secondphonenumber" class="information_secondphonenumber">
										</div>
									</div>
									<div class="user_profile_information_gender_box">
										<p>Gender</p>
										남자 <input type="radio" name="user_gender" id="information_gender" class="information_gender" name="gender" value="남자">
										여자 <input type="radio" name="user_gender" id="information_gender" class="information_gender" name="gender" value="여자">
									</div>
									<div class="user_profile_information_address_box">
										<p>Address</p>
										<input type="text" name="user_address" id="information_address" class="information_address">
									</div>
									<div class="user_profile_information_dirthday_box">
										<p>Birthday</p>
										<input type="date" name="user_dirthday" class="information_birthday">
									</div>
									<div class="user_profile_information_email_box">
										<p>E-mail</p>
										<input type="email" name="user_email" class="information_email">
									</div>
									<div class="user_profile_information_detail_box">
										<p>Memo</p>
										<input type="text" name="user_memo" id="information_detail" class="information_detail">
									</div>
									<input type="submit" value="연락처 저장" name="user_save_button" class="information_save_button">
								</div>
							</li>
						</ul>
					</form>
				</article>
			</section>
		</div>
		<script>
			let reader = new FileReader();
			reader.onload = (readerevent) => {
				document.querySelector(".user_img_src").setAttribute('src',readerevent.target.result);
			};
			document.querySelector(".user_img_file").addEventListener("change",(changeevent) =>{
				let imgfile = changeevent.target.files[0];
				reader.readAsDataURL(imgfile);
			});
		</script>
	</body>
</html>
