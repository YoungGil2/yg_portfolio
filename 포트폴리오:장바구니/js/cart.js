window.onload = function(){
	// 포트폴리오 팝업창
	$('.shopping_cart_popup').fadeOut(500);
	$('.shopping_cart_popup').fadeIn(1000);
	setTimeout(function(){
		$('.shopping_cart_popup').fadeOut(500);
	},3000);
	// 제품 가격
	let product_value = 71960;
	// 제품 총가격
	var all_total_value = 0;
	// 서브 사진 호버시 메인 사진 변경
	$('#view_1').hover(function(event){ $('#product_image').attr("src","./img/product_shoes_1.jpg"); });
	$('#view_2').hover(function(event){ $('#product_image').attr("src","./img/product_shoes_2.jpg"); });
	$('#view_3').hover(function(event){ $('#product_image').attr("src","./img/product_shoes_3.jpg"); });
	$('#view_4').hover(function(event){ $('#product_image').attr("src","./img/product_shoes_4.jpg"); });
	$('#view_5').hover(function(event){ $('#product_image').attr("src","./img/product_shoes_5.jpg"); });
	// 상품 사이즈 선택시 확인창에 내용 입력
	$('.shopping_product_size_220').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_230').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_240').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_250').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_260').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_270').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	$('.shopping_product_size_280').on("click", function(event){
		product_size = $(this).attr("id");
		var product_1 = new product_object(product_size, "1");
		product_1.print_product();
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());
	});
	// 상품 확인창 출력
	function product_object(size, number){
		this.size = size;
		this.number = number;
		this.print_product = function(){
			document.getElementById("shopping_product_check").innerHTML += "<ul class='shopping_product_check_content_"+this.size+" shopping_product_check_content'><li class='shopping_product_check_content_size'>"+this.size+"</li><li id='product_number_p' class='product_number_p product_number'>+</li><li id='product_number' class='product_number'>"+this.number+"</li><li id='product_number_m' class='product_number_m product_number'>-</li><li class='box_value'>"+product_value.toLocaleString()+"</li><li class='box_value_won'>원</li><li id='remove_btn' class='remove_btn'>X</li></ul>"
		}
	}
	// 상품 확인창 수량 
	this.addEventListener("click",function(event){
		switch(event.target.id){
			case 'product_number_p' : product_plus(); break;	
			case 'product_number_m' : product_minus(); break;
			case 'remove_btn' : check_box_product_remove(1); break;
			case 'cart_remove_btn' : check_box_product_remove(2); break;
		}
	});
	// 수량 증가
	function product_plus(){
		product_number = $(event.target).next().html(); 
		product_number++;
		$(event.target).next().html(product_number);
		let total_value = product_number*product_value;
		// 제품 확인창
		$(event.target).parent().find('.box_value').html(total_value.toLocaleString());
		var all_total_value = 0;
		$('[class="box_value"]').each(function(){
			all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$(".shopping_product_value").html(all_total_value.toLocaleString());

		// 장바구니	
		$(event.target).parent().find('.cart_value').html(total_value.toLocaleString());
		// 장바구니 전체 가격
		var cart_all_total_value = 0;
		$('[class="cart_value"]').each(function(){
			cart_all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		// 삭제 후 장바구니 가격 수정
		$('.shopping_cart_total_price_money').html((cart_all_total_value).toLocaleString());
	}
	// 수량 감소
	function product_minus(){
		product_number = $(event.target).prev().html();
		if(product_number > 1) {
			product_number--;
			$(event.target).prev().html(product_number);
			// 제품 확인창
			let total_value = product_number*product_value;
			$(event.target).parent().find('.box_value').html(total_value.toLocaleString());
			var all_total_value = 0;
			$('.box_value').each(function(){
				all_total_value += Number($(this).html().replace( /,/gi, ""));
			});
			$(".shopping_product_value").html(all_total_value.toLocaleString());
			// 장바구니
			$(event.target).parent().find('.cart_value').html(total_value.toLocaleString());
			// 장바구니 전체 가격
			var cart_all_total_value = 0;
			$('[class="cart_value"]').each(function(){
				cart_all_total_value += Number($(this).html().replace( /,/gi, ""));
			});
			// 삭제 후 장바구니 가격 수정
			$('.shopping_cart_total_price_money').html((cart_all_total_value).toLocaleString());
		}
	}
	// 상품 삭제
	function check_box_product_remove(connect_value){
		if(connect_value == "1"){
			let product_number = $('#product_number').html();
			// 확인창 전체가격
			var all_total_value = 0;
			$('[class="box_value"]').each(function(){
				all_total_value += Number($(this).html().replace( /,/gi, ""));
			});
			// 삭제 상품 확인창 
			$(event.target).parent('.shopping_product_check_content').remove();
			// 삭제 후 전체가격 수정
			$(".shopping_product_value").html((all_total_value-(product_value*product_number)).toLocaleString());
		}
		if(connect_value == "2"){
			let product_number = $('#product_number').html();
			// 장바구니 전체 가격
			var cart_all_total_value = 0;
			$('[class="cart_value"]').each(function(){
				cart_all_total_value += Number($(this).html().replace( /,/gi, ""));
			});
			// 삭제 상품 장바구니
			$(event.target).parent('.shopping_product_check_content').remove();
			// 장바구니 안에 상품 리스트 개수
			var boxCount = document.getElementsByClassName('cart_value');
			var i = 0;
			while(i < boxCount.length){
				i++;
			}
			$('.cart_number').html(i);
			// 삭제 후 장바구니 가격 수정
			$('.shopping_cart_total_price_money').html((cart_all_total_value-(product_value*product_number)).toLocaleString());
		}
	}
	// 장바구니 담기
	$(".shopping_product_cart_input").on("click",function(event){
		$(".shopping_cart").css("display","block");
		let cart_price = $('.shopping_product_value').html();
		// 담기 클릭시 값 초기화
		$('.shopping_cart_total_price_money').html(0);
		// 선택 확인창 제품 장바구니에 담기
		let cart_product = $('.shopping_product_check').html();
		$('.shopping_cart_product_list').append(cart_product);
		
		$('.shopping_cart_product_list').parent().find('.box_value').attr('class','cart_value');
		$('.shopping_cart_product_list').parent().find('#remove_btn').attr('id','cart_remove_btn');
		// 장바구니 담기 후 상품 확인창 초기화
		$('.shopping_product_check').html("");
		// 장바구니 담기 후 상품 확인창 금액 초기화
		$('.shopping_product_value').html(0);
		// 탑 메뉴 장바구니 안에 리스트 개수 출력
		var boxCount = document.getElementsByClassName('cart_value');
		var i = 0;
		while(i < boxCount.length){
			i++;
		}
		$('.cart_number').html(i);

		// 장바구니 안에 제품 총 금액 출력
		var cart_all_total_value = 0;
		$('[class="cart_value"]').each(function(){
			cart_all_total_value += Number($(this).html().replace( /,/gi, ""));
		});
		$('.shopping_cart_total_price_money').html((cart_all_total_value).toLocaleString());
	});// 장바구니 담기
	// 장바구니 닫기
	$(".shopping_cart_close").on("click",function(event){
		$(".shopping_cart").css("display","none");
	});
	// 장바구니 열기
	$(".top_menu_cart_open").on("click",function(event){
		$(".shopping_cart").css("display","block");
	});
	// 구매 버튼
	$('.shopping_cart_purchase').on("click",function(event){
		$('.shopping_cart_popup').fadeIn(1000);
		setTimeout(function(){
			$('.shopping_cart_popup').fadeOut(1000);
		},3000);
	});













}// window.onload 
