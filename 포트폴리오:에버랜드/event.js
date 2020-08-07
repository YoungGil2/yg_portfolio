window.onload = function(){
	// 블러드 시티 슬라이드 버튼
	let silde_nav_but1 = document.getElementById("silde_nav_but1");
	let silde_nav_but2 = document.getElementById("silde_nav_but2");
	let silde_nav_but3 = document.getElementById("silde_nav_but3");
	let silde_nav_but4 = document.getElementById("silde_nav_but4");
	// 좀비 라이더 버튼
	let article_4_left_but = document.getElementById("article_4_left_but");
	let article_4_right_but = document.getElementById("article_4_right_but");
	// 이벤트 핸들러 
	this.addEventListener('click',function(event){
		switch(event.target.id){
			// 김완선 비디오 버튼
			case 'video_box_close_1': video_box_1(1); break;
			case 'video_box_opan_1': video_box_1(2); break;
			case 'video_box_close_2': video_box_2(1); break;
			case 'video_box_opan_2': video_box_2(2); break;
			// 블러드 시티 슬라이드 버튼
			case 'silde_nav_but1': silde(1); break;
			case 'silde_nav_but2': silde(2); break;
			case 'silde_nav_but3': silde(3); break;
			case 'silde_nav_but4': silde(4); break;
			// 좀비 라이더 버튼
			case 'article_4_left_but': zombieride(1); break;
			case 'article_4_right_but': zombieride(2); break;
			// 좀비 분장살롱 버튼
			case 'close_but_1': zombiesalon(1); break;
			case 'opan_but_1': zombiesalon(2); break;
			case 'but_left': zombiesalon_but(1); break;
			case 'but_right': zombiesalon_but(2); break;
			case 'announce_box_close': zombiesalon_2(1); break;
			case 'opan_but_2': zombiesalon_2(2); break;
			// 네비게이션 
			case 'logo_top': location.replace("./event.html#article_1"); break;
			case 'article_1_title_box_nav': location.replace("./event.html#article_2"); break;
			case 'nav_a': location.replace("./event.html#article_2"); break;
			// 네이게이션 사이드 버튼
			case 'nav_but_11': nav_but(1); break;
			case 'nav_but_22': nav_but(2); break;
			case 'nav_but_33': nav_but(3); break;
			case 'nav_but_44': nav_but(4); break;
			case 'nav_but_55': nav_but(5); break;
		}
	});
	// 네이게이션 사이드 메뉴 버튼 
	function nav_but(value){
		if(value == 1){
			location.replace("./event.html#article_1");
		}
		if(value == 2){
			location.replace("./event.html#article_2");
		}
		if(value == 3){
			location.replace("./event.html#article_3");
		}
		if(value == 4){
			location.replace("./event.html#article_4");
		}
		if(value == 5){
			location.replace("./event.html#article_5");
		}
	}
	// 메인 화면 비디오 
	this.addEventListener('mouseover',function(event){
		switch(event.target.id){
			case 'article_1_bg_1_video' : article_1_bg_1_video.muted= false; break;
		}
	});
	this.addEventListener('mouseout',function(event){
		switch(event.target.id){
			case 'article_1_bg_1_video' : article_1_bg_1_video.muted= true; break;
		}
	});
	// 김완선 비디오 
	function video_box_1(value){
		if(value ==1){
			$('#video_box_1').css('display','none');
			$('#video_box_1').html('""');
		}
		else {
			$('#video_box_1').css('display','block');	
			$('#video_box_1').html('<div id="video_box_close_1" class="video_box_close_1">X</div> <iframe width="1280" height="720" src="https://www.youtube.com/embed/ASEPRcKdd44" frameborder="0" allow="accelerometer; autoplay; encrypted-media    ; gyroscope; picture-in-picture" allowfullscreen></iframe>');
		}
	}
	function video_box_2(value){
		if(value ==1){
			$('#video_box_2').css('display','none');
			$('#video_box_2').html('""');
		}
		else {
			$('#video_box_2').css('display','block');
			$('#video_box_2').html('<div id="video_box_close_2" class="video_box_close_2">X</div> <iframe width="1280" height="720" src="https://www.youtube.com/embed/04vzs9KDa40" frameborder="0" allow="accelerometer; autoplay; encrypted-media    ; gyroscope; picture-in-picture" allowfullscreen></iframe>');
		}
	}
	// 블러드 시티 슬라이드
	function silde(value){
		if(value == 1){
			$('.silde_sub_box').css('margin-left','0px');
			$('#silde_nav_but1').css('background','#542437');

			$('#silde_nav_but2').css('background','#C02942');
			$('#silde_nav_but3').css('background','#C02942');
			$('#silde_nav_but4').css('background','#C02942');
		}
		if(value == 2){
			$('.silde_sub_box').css('margin-left','-900px');
			$('#silde_nav_but2').css('background','#542437');

			$('#silde_nav_but1').css('background','#C02942');
			$('#silde_nav_but3').css('background','#C02942');
			$('#silde_nav_but4').css('background','#C02942');
		}
		if(value == 3){
			$('.silde_sub_box').css('margin-left','-1800px');
			$('#silde_nav_but3').css('background','#542437');

			$('#silde_nav_but1').css('background','#C02942');
			$('#silde_nav_but2').css('background','#C02942');
			$('#silde_nav_but4').css('background','#C02942');
		}
		if(value == 4){
			$('.silde_sub_box').css('margin-left','-2700px');
			$('#silde_nav_but4').css('background','#542437');

			$('#silde_nav_but1').css('background','#C02942');
			$('#silde_nav_but2').css('background','#C02942');
			$('#silde_nav_but3').css('background','#C02942');
		}
	}
	// 좀비라이더 스크린
	let ride_count = 1;
	function zombieride(value){
		if(value == 1){
			if(ride_count>1){
				ride_count--;
			}
			else {}
		}
		else {
			if(ride_count<4){
				ride_count++;
			}
			else {}
		}
	for(i=1; i<=4; i++){
		this["scr_show_"+i].style.opacity="0";
	}
	this["scr_show_"+ride_count].style.opacity="1";
	}
	// 좀비 분장살롱 포토
	function zombiesalon(value){
		if(value ==  1){
			$('.view_box').css('display','none');
		}
		if(value == 2){
			$('.announce_box').css('display','none');
			$('.view_box').css('display','block');
		}
	}
	// 좀비 분장살롱 이용안내
	function zombiesalon_2(value){
		if(value ==  1){
			$('.announce_box').css('display','none');
		}
		else {
			$('.view_box').css('display','none');
			$('.announce_box').css('display','block');
		}
	}
	// 좀비 분장살롱 버튼
	let salon_count = 1;
	function zombiesalon_but(value){
		if(value ==  1){
			if(salon_count > 1){
				salon_count--;
			}
			else {}
		}
		else {
			if(salon_count < 5){
				salon_count++;
			}
			else {}
		}
		for(i=1; i<=5; i++){
			this["view_"+i].style.opacity="0";
		}
		this["view_"+salon_count].style.opacity="1";
	}
	var docElem = document.documentElement,
	docHeight = Math.max(docElem.scrollHeight,docElem.offsetHeight);
	// 스크롤 이벤트 핸들러
	this.addEventListener('scroll', function(){
		scrollPos = docElem.scrollTop;
		console.log(scrollPos);
		//사이드 네비게이션 버튼
		if(scrollPos > 0){
			nav_but_11.className = 'nav_but_scroll';
			nav_but_1.className = 'p_scroll';
		}
		if(scrollPos > 400){
			nav_but_11.className = 'nav_but_11 nav_but';
			nav_but_22.className = 'nav_but_scroll';
			nav_but_2.className = 'p_scroll';
			nav_but_1.className = 'nav_p';
		}
		if(scrollPos < 400){
			nav_but_22.className = 'nav_but_22 nav_but';
			nav_but_2.className = 'nav_p';
		}
		if(scrollPos > 1400){
			nav_but_22.className = 'nav_but_22 nav_but';
			nav_but_33.className = 'nav_but_scroll';
			nav_but_3.className = 'p_scroll';
			nav_but_2.className = 'nav_p';
		}
		if(scrollPos < 1400){
			nav_but_33.className = 'nav_but_33 nav_but';
			nav_but_3.className = 'nav_p';
		}

		if(scrollPos > 2400){
			nav_but_33.className = 'nav_but_33 nav_but';
			nav_but_44.className = 'nav_but_scroll';
			nav_but_4.className = 'p_scroll';
			nav_but_3.className = 'nav_p';
		}
		if(scrollPos < 2400){
			nav_but_44.className = 'nav_but_44 nav_but';
			nav_but_4.className = 'nav_p';
		}

		if(scrollPos > 3400){
			nav_but_44.className = 'nav_but_44 nav_but';
			nav_but_55.className = 'nav_but_scroll';
			nav_but_5.className = 'p_scroll';
			nav_but_4.className = 'nav_p';
		}
		if(scrollPos < 3400){
			nav_but_55.className = 'nav_but_55 nav_but';
			nav_but_5.className = 'nav_p';
		}
		// 김완선 X 에버랜드 2번 타이틀 
		if(scrollPos > 700){
			article_2_title.className = 'article_2_title_scroll';
		}
		else {
			article_2_title.className = 'article_2_title';
		}
		// 아티클 3번 타이틀
		if(scrollPos > 1500){
			article_3_title.className = 'article_3_title_scroll';
		}
		else {
			article_3_title.className = 'article_3_title';
		}
		// 아티클 3번 설명글
		if(scrollPos > 1600){
			article_3_bg_1.className = 'article_3_bg_1_scroll';
		}
		else {
			article_3_bg_1.className = 'article_3_bg_1';
		} 
	});
}

