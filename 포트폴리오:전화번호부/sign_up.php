<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<!-- 타이틀 -->
		<title>전화번호부 회원가입 페이지</title>
		<!-- 구글 폰트 -->
		<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
		<!-- 외부 스타일 시트 -->
		<link rel="stylesheet" href="./css/sign_in.css">
		<!-- 제이쿼리 -->
		<script src="./js/jquery.js"></script>
		<!-- 외부 자바스크립트 -->
		<script src="./js/sign_in.js"></script>
	</head>
	<body>
		<section>
			<article>
				<!-- 회원가입 메인 박스 -->
				<div class="sign_in_box">
					<ul class="sign_in_box_content">
						<li  class="content_title">SignUp</li>
						<li class="content_form">
							<form action="./sign_up_input.php" method="post" enctype="multipart/form-data">
								<h1>회원가입</h1>
								<div class="id_box"><p>회원 ID</p><input type="text" name="sign_in_ID"></div>
								<div class="pw_box"><p>비밀번호</p><input type="password" name="sign_in_PW"></div>
								<div class="pw_box"><p>비밀번호 확인</p><input type="password" name="sign_in_PW_check"></div>
								<div class="name_box"><p>이름</p><input type="text" name="sign_in_name"></div>
								<div class="gender_box">
									<p>성별</p>
									남자<input type="radio" name="sign_in_gender" id="sign_gender" value="남자">
									여자<input type="radio" name="sign_in_gender" id="sign_gender" valus="여자">
								</div>
								<div class="phonenumber_box">
									<p>휴대전화</p>
									<input type="text" name="sign_in_phonenumber">
								</div>
								<div class="email_box">
									<p>이메일</p>
									<input type="email" name="sign_in_email">
								</div>
								<input type="submit" name="page_move" value="가입하기">
							</form>
						</li>
					</ul>
				</div>	<!-- 회원가입 메인 박스 -->
			</article>
		</section>
	</body>
</html>
