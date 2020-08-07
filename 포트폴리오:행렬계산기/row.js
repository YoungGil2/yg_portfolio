window.onload = function(){
	// input 변수 선언
	var length_X_1 = document.getElementById("length_X_1");
	var height_Y_1 = document.getElementById("height_Y_1");
	var length_X_2 = document.getElementById("length_X_2");
	var height_Y_2 = document.getElementById("height_Y_2");
	// 출력 박스 변수 선언
	var result_box_one_row = document.getElementById("result_box_one_row");
	var result_box_two_row = document.getElementById("result_box_two_row");
	// 버튼 변수 선언
	var result_bt = document.getElementById("result_bt");
	var result_bt_plus = document.getElementById("result_bt_plus");
	var result_bt_Minus = document.getElementById("result_bt_minus");
	var result_bt_multi = document.getElementById("result_bt_multi");
	this.addEventListener('click', function(mye){
		switch(event.target.id){
			//행렬 출력 호출
			case 'result_bt' : start_run(); break;
			// 덧셈 값 출력
			case 'result_bt_plus' : plus_start(); break;
			// 뺄셈 값 출력
			case 'result_bt_minus' : minus_start(); break;
			// 곱셈 값 출력
			case 'result_bt_multi' : multi_start(); break;
			// 에러 창 닫기
			case 'close_but' : error_box_1.style.display = "none"
					error_box_2.style.display = "none"
				; 
						
				break;
		}
	});
	//행렬 호출 출력
	function start_run(){
		result_box_one_row.innerHTML = "";
		result_box_two_row.innerHTML = "";
		var i=0;
		while(i<length_X_1.value){
			var j=0;
			while(j<height_Y_1.value){
				result_box_one_row.innerHTML += '<input id="one_'+i+j+'"  type="number">';
				j++;
			}	
			result_box_one_row.innerHTML += "<br>";
			i++;
		}
		var i=0;
		while(i<length_X_2.value){
			var j=0;
			while(j<height_Y_2.value){
				result_box_two_row.innerHTML += '<input id="two_'+i+j+'"  type="number">';
				j++;
			}
			result_box_two_row.innerHTML += "<br>";
			i++;
		}
	}
	// 덧셈 호출 함수 실행
	function plus_start(){
		if(Number(length_X_1.value) == Number(length_X_2.value) && Number(height_Y_1.value    ) == Number(height_Y_2.value)){
			print_box.innerHTML = "";
			var oneArray1 = [];
			var twoArray2 = [];
			var i=0;
			while(i<length_X_1.value){
				var j=0;
				while(j<height_Y_1.value){
					var one_val = document.getElementById("one_"+i+j).value;
					var two_val = document.getElementById("two_"+i+j).value;
					oneArray1.push(one_val);
					twoArray2.push(two_val);
					j++;
				}
				i++;
			}
			var resultArray3 = [];
			var i=0;
			while(i<Number(length_X_1.value)*Number(height_Y_1.value)){
				resultArray3.push(Number(oneArray1[i])+Number(twoArray2[i]));
				i++;
			}
			var i=0;
			while(i<Number(length_X_1.value)*Number(height_Y_1.value)){
				print_box.innerHTML += '<input id="result_'+i+j+'" value="'+resultArray3[i]+'" type="number">';
				if((i+1) % length_X_1.value == 0){
					print_box.innerHTML += "<br>";
				}
				i++;
			}
		}
		else {
			let error_box_2 = document.getElementById("error_box_2");
			error_box_2.style.display = "block";
		}
	}
	// 뺄셈 호출 함수 실행
	function minus_start(){
		if(Number(length_X_1.value) == Number(length_X_2.value) && Number(height_Y_1.value) == Number(height_Y_2.value)){
			print_box.innerHTML = "";
			var oneArray1 = [];
			var twoArray2 = [];
			var i=0;
			while(i<length_X_1.value){
				var j=0;
				while(j<height_Y_1.value){
					var one_val = document.getElementById("one_"+i+j).value;
					var two_val = document.getElementById("two_"+i+j).value;
					oneArray1.push(one_val);
					twoArray2.push(two_val);
					j++;
				}
				i++;
			}
			var resultArray3 = [];
			var i=0;
			while(i<Number(length_X_1.value)*Number(height_Y_1.value)){
				resultArray3.push(Number(oneArray1[i])-Number(twoArray2[i]));
				i++;
			}
			var i=0;
			while(i<Number(length_X_1.value)*Number(height_Y_1.value)){
				print_box.innerHTML += '<input id="result_'+i+'" value="'+resultArray3[i]+'" type="number">';
				if((i+1) % length_X_1.value == 0){
					print_box.innerHTML += "<br>";
				}
				i++;
			}
		}
		else {
			let error_box_2 = document.getElementById("error_box_2");
			error_box_2.style.display = "block";
		}
	}
	//곱셈 호출 함수 실행
	function multi_start(){
		if(length_X_1.value == height_Y_2.value){
			print_box.innerHTML = "";
			var oneArray1 =  [];
			var twoArray2 =  [];
			var resultArray= [];
			var i= 0;
			while(i < length_X_1.value){
			oneArray1[i] = new Array();
				var j=0;
				while(j < height_Y_1.value){
					var one_val = document.getElementById("one_"+i+j).value;
					oneArray1[i][j] = one_val;
					j++;
				}
				i++;
			}
			var i = 0;
			while(i < length_X_2.value){
				twoArray2[i] = new Array();
				var j = 0;
				while(j < height_Y_2.value){
					var two_val = document.getElementById("two_"+i+j).value;
					twoArray2[i][j] = two_val;
					j++;
				}
				i++;
			}
			var threeArray3 = [];
			var i = 0;
			while(i < length_X_1.value){
				resultArray[i] = new Array();
				var j = 0;
				while(j < height_Y_2.value){
					var k = 0;
					resultArray[i][j] = 0;
					while(k < twoArray2.length){
					resultArray[i][j] += oneArray1[i][k] * twoArray2[k][j];
						k++;
					}
					threeArray3.push(resultArray[i][j]);
					j++;
				}
				i++;
			}
			var i = 0;
			while(i < Number(length_X_1.value) * Number(height_Y_2.value)){
				print_box.innerHTML += '<input id="result_'+i+j+'" value="'+threeArray3[i]+'" type="number">';
				if((i+1) % length_X_1.value == 0){
					print_box.innerHTML += "<br>";
				}
				i++;
			}
		}
		else {
			let error_box_1 = document.getElementById("error_box_1");
			error_box_1.style.display = "block";
		}
	}
}
