<?php
session_start();
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
//	echo "<meta http-equiv='refresh' content='0;url=./login.html'>";
}

?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<link href="./css/number_list.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<title>전화번호부 리스트</title>
	</head>
	<body>
		<header>
			<div class="top_menu">
<?php			
if(!isset($_COOKIE['login_id']) || !isset($_SESSION['login_pw'])){
	echo "<div class='admin_information'>
		방문자(비회원)님 어서오세요.<br>
		<a href='./login.html' class='logout_button'>로그인</a>
	</div>";
}
?>
<?php
if(isset($_COOKIE['login_id']) || isset($_SESSION['login_pw'])){
// DB연결 PHP
include './dbconnect.php';
$login_sql = "SELECT * FROM `NUMBER_LIST_LOGIN`";
$login_find = mysqli_query($dbconnect,$login_sql) or die(mysqli_error($dbconnect));
$result_row = mysqli_fetch_assoc($login_find);
echo "<div class='admin_information'>{$result_row['NAME']}({$result_row['ID']})님 어서오세요.<br>
	<a href='./logout.php' class='logout_button' id='logout_button'>로그아웃</a>
	<a href='./admin_page.php' class='add_button'>연락처 추가</a>
</div>";
}
?>
			</div>
		</header>
		<nav>
			<div class="search_box">
				<p class="search_box_title">조회하기</p>
				<form action="./number_list.php" method="post" enctype="multipart/form-data">
					<select name="member_search" id="member_search" class="member_search">
						<option value="">=====선택=====</option>
						<option value="LAST_NAME">성</option>
						<option value="FIRST_NAME">이름</option>
						<option value="PHONE_NUMBER">휴대폰번호</option>
						<option value="GENDER">성별</option>
						<option value="ADDRESS">주소</option>
						<option value="BIRTHDAY">생년월일</option>
						<option value="EMAIL">이메일 주소</option>
					</select>
					<label for="member_search_content"></label>
					<input type="text" name="member_search_content" id="member_search_content" 
						class="member_search_content" placeholder="정보를 입력하시오">
					<input type="submit" name="memeber_search_start" value="검색" class="memeber_search_start">
				</form>
			</div>
		</nav>
		<section>
			<article>
				<div class="information_box">
					<div class="information_box_top_manu">
						<span class="information_close_button"></span>
						<span class="information_title">자세히 보기</span>
					</div>
					<div id="information_content" class="information_content">
						<p class="information_content_p">자세히 보기 정보가 없습니다.</p>
					</div>
				</div>
			</article>
		</section>
		<script>
			function loadDoc(user_num){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById("information_content").innerHTML = this.responseText;
					}
				};
				xhttp.open("GET","member_info.php?rowNum="+user_num,true);
				xhttp.send();
			}
		</script>
	</body>
</html>
<?php
// DB연결 PHP
include './dbconnect.php';
//데이터 베이스에 업로드
if(isset($_POST['user_save_button'])){
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_phonenumber = $_POST['user_phonenumber'];
	$user_secondphonenumber = $_POST['user_secondphonenumber'];
	if($_POST['user_gender'] == '남자'){
		@$user_gender = "남자";
	}else {
		@$user_gender = "여자";
	}
	$user_address = $_POST['user_address'];
	$user_birthday = $_POST['user_dirthday'];
	$user_email = $_POST['user_email'];
	$user_memo = $_POST['user_memo'];
	// user-img DB 업로드
	// 업로드 될 폴더 경로
	$target_dir = "./img/";
	$upload_OK = 1;
	// 데이터 베이스에 업로드될 파일명
	$target_file = basename($_FILES["user_img_file"]["name"]);
	// 데이터 베이스에 업로드될 템프네임
	$target_file_tmp_name = $user_phonenumber.basename($_FILES["user_img_file"]["tmp_name"].'.'.basename($_FILES["user_img_file"]["type"]));
	// 폴더명과 파일명(경로)
	$target_dir_file = $target_dir.basename($_FILES["user_img_file"]["name"]);
	// 이미지 파일이 맞는지 확인
	$check_file = getimagesize($_FILES["user_img_file"]["tmp_name"]);
	// 이미지 파일 타입
	$target_file_type =  pathinfo($target_dir_file, PATHINFO_EXTENSION);
	// 파일 업로드 검사
	if($check_file != false){$upload_OK = 1;}else {$upload_OK = 0;}
	if(file_exists($target_dir_file)){$upload_OK = 0;}
	if($_FILES["user_img_file"]["size"] > 1000000){$upload_OK = 0;}
	if($target_file_type != "jpg" && $target_file_type != "png" && $target_file_type != "jpeg" && $target_file_type != "gif"){$upload_OK = 0;}
	if($upload_OK == 0){
	}else {
		$target_file_upload_tmp_name = $target_dir.$user_phonenumber.basename($_FILES["user_img_file"]["tmp_name"].'.'.basename($_FILES["user_img_file"]["type"]));
		if(move_uploaded_file($_FILES["user_img_file"]["tmp_name"], $target_file_upload_tmp_name)){
		} else {
		}
	}
	$input_SQL = "INSERT INTO `MEMBER_TABLE` (FIRST_NAME, LAST_NAME, PHONE_NUMBER, SECOND_PHONE_NUMBER, GENDER, ADDRESS, BIRTHDAY, EMAIL, MEMO, IMG_URL, IMG_TMP_NAME) VALUES ('".$user_firstname."', '".$user_lastname."', '".$user_phonenumber."', '".$user_secondphonenumber."', '".$user_gender."', '".$user_address."', '".$user_birthday."', '".$user_email."', '".$user_memo."', '".$target_file."', '".$target_file_tmp_name."')";
	$result = mysqli_query($dbconnect, $input_SQL);
	if(!$result){
		echo "Could not successfilly run query ($input_SQL) from DB: ".mysqli_error($dbconnect);
		exit;
	}
}
//데이터 베이스에 값을 출력
include './dbconnect.php';
$sql_select = "SELECT * FROM `MEMBER_TABLE`";
$loadrow = mysqli_query($dbconnect,$sql_select) or die(mysqli_error($dbconnect));
echo "<div class='folder_box'>";
echo "<div class='folder_box_top_manu'><span class='folder_close_button'></span><span class='folder_title'>전체 리스트</span></div>";	
echo "<ul class='title_list'>";
echo
         "<li>번호</li>
         <li>성</li>
         <li>이름</li>
         <li>휴대폰 번호1</li>
         <li>휴대폰 번호2</li>
         <li>성별</li>
         <li>주소</li>
         <li>생년월일</li>
	 <li>이메일 주소</li>";
if(isset($_COOKIE['login_id']) || isset($_SESSION['login_pw'])){
echo
    	"<li>선택</li>
";
}
echo "</ul>";
echo "<div class='folder_content'>";
$i = 1;
while($result_row = mysqli_fetch_assoc($loadrow)){
echo "<ul id='number_list' class='number_list'>";
echo 
	"
	<li class='information_button'>$i</li>
	<li>{$result_row['LAST_NAME']}</li>
	<li>{$result_row['FIRST_NAME']}</li>
	<li>{$result_row['PHONE_NUMBER']}</li>
	<li>{$result_row['SECOND_PHONE_NUMBER']}</li>
	<li>{$result_row['GENDER']}</li>
	<li>{$result_row['ADDRESS']}</li>
	<li>{$result_row['BIRTHDAY']}</li>
	<li>{$result_row['EMAIL']}</li>";
	if(isset($_COOKIE['login_id']) || isset($_SESSION['login_pw'])){
	echo "
	<li><a href='./record_modify.php?rowNum={$result_row['USERNUMBER']}' class='record_delete_button'>수정</a></li>
	<li>/</li>
	<li id='record_delete_button{$result_row['USERNUMBER']}' class='record_delete_button'>삭제</li>";
	echo
         "<div id='delete_check{$result_row['USERNUMBER']}' class='delete_check'>
                 <div class='delete_check_top_bar'>
                         <span id='delete_check_close_button' class='delete_check_close_button'></span>
                 </div>
                 <p class='delete_check_content'>삭제 하시겠습니까?</p>
                 <div class='delete_check_button_box'>";
                 echo "<a id='yes_button{$result_row['USERNUMBER']}' class='delete_check_button yes_button'>예</a>";
                 echo "<a id='no_button{$result_row['USERNUMBER']}' class='delete_check_button no_button'>아니오</a>
                 </div>
	 </div>
	";
echo "
	<script>
		this.addEventListener('click', function(event){
			switch(event.target.id){
				case 'yes_button{$result_row['USERNUMBER']}': delete_check_ok{$result_row['USERNUMBER']}({$result_row['USERNUMBER']}); break;
				case 'record_delete_button{$result_row['USERNUMBER']}': del_start{$result_row['USERNUMBER']}(); break;
				case 'no_button{$result_row['USERNUMBER']}': delete_check_closed{$result_row['USERNUMBER']}();
				case 'delete_check_close_button': delete_check_closed{$result_row['USERNUMBER']}();
			}
		});
		function del_start{$result_row['USERNUMBER']}(){
			document.getElementById('delete_check{$result_row['USERNUMBER']}').style.display = 'block';
		}
		function delete_check_closed{$result_row['USERNUMBER']}(){
			delete_check{$result_row['USERNUMBER']}.style.display = 'none';
		}
		function delete_check_ok{$result_row['USERNUMBER']}(value){
			location.href = './record_delete.php?rowNum='+value;
		}
	</script>
";
	}
	echo "<li class='user_info' onclick='loadDoc({$result_row['USERNUMBER']})'>자세히 보기</li>";
echo "</ul>";
$i++;
}
echo "</div>";
echo "</div>";
@$member_search = $_POST['member_search'];
if(isset($_POST['memeber_search_start']) && !$member_search == ""  ){
		$member_search = $_POST['member_search'];
		$member_search_content = $_POST['member_search_content'];
		include './dbconnect.php';
		$sql_like = "SELECT * FROM `MEMBER_TABLE` WHERE $member_search LIKE '%$member_search_content%';";
		$loadrow1 = mysqli_query($dbconnect,$sql_like) or die(mysqli_error($dbconnect));
		echo "<div class='folder_box'>";
		echo "<div class='folder_box_top_manu'><span class='folder_close_button'></span>
			<span class='folder_title'>조회 내용</span>
			</div>";
		echo "<ul class='title_list'>";
		echo
			"<li>번호</li>
			<li>성</li>
			<li>이름</li>
			<li>휴대폰 번호1</li>
			<li>휴대폰 번호2</li>
			<li>성별</li>
			<li>주소</li>
			<li>생년월일</li>
			<li>이메일 주소</li>";
		echo "</ul>";
		echo "<div class='folder_content'>";
		$i= 1;
		while($row = mysqli_fetch_assoc($loadrow1)){
		echo "<ul id='number_list' class='number_list'>";
		echo "
			<li class='information_button'>$i</li>
			<li>{$row['LAST_NAME']}</li>
			<li>{$row['FIRST_NAME']}</li>
			<li>{$row['PHONE_NUMBER']}</li>
			<li>{$row['SECOND_PHONE_NUMBER']}</li>
			<li>{$row['GENDER']}</li>
			<li>{$row['ADDRESS']}</li>
			<li>{$row['BIRTHDAY']}</li>
			<li>{$row['EMAIL']}</li>
			<li onclick='loadDoc({$row['USERNUMBER']})' style='cursor: pointer'>자세히 보기</li>";
		echo "</ul>";
		$i++;
		}
		echo "</div>";
		echo "</div>";
}
?>







