let isloadIdex = 0;
$(window).on('scroll  mousemove touchstart',function(){
	try{
		if(!isloadIdex){
			isloadIdex = 1
			var slidehome = new Swiper('.slide-swiper', {
				slidesPerView: 1,
				grabCursor: true,
				spaceBetween: 0,
				roundLengths: true,
				slideToClickedSlide: false,
				autoplay:false,
				loop: false,
				navigation: {
					nextEl: '.slide-swiper .swiper-button-next',
					prevEl: '.slide-swiper .swiper-button-prev',
				},
				breakpoints: {
					300: {
						slidesPerView: 1,
						spaceBetween: 0
					},
					500: {
						slidesPerView: 1,
						spaceBetween: 0
					},
					640: {
						slidesPerView: 1,
						spaceBetween: 0
					},
					767: {
						slidesPerView: 1,
						spaceBetween: 0
					},
					991: {
						slidesPerView: 1,
						spaceBetween: 0
					},
					1200: {
						slidesPerView: 1,
						spaceBetween: 0
					}
				}
			});
			$(".not-dqtab").each( function(e){
				var $this1 = $(this);
				var $this2 = $(this);
				var datasection = $this1.closest('.not-dqtab').attr('data-section');
				$this1.find('.tabs-title .item:first-child').addClass('current');
				$this1.find('.tab-content').first().addClass('current');
				var _this = $(this).find('.wrap_tab_index .title_module_main');
				var droptab = $(this).find('.link_tab_check_click');
				$this1.find('.tabtitle1.ajax .item').click(function(){
					var $this2 = $(this),
						tab_id = $this2.attr('data-tab'),
						url = $this2.attr('data-url');
					var etabs = $this2.closest('.e-tabs');
					etabs.find('.tab-viewall').attr('href',url);
					etabs.find('.tabs-title .item').removeClass('current');
					etabs.find('.tab-content').removeClass('current');
					$this2.addClass('current');
					etabs.find("."+tab_id).addClass('current');
					if(!$this2.hasClass('has-content')){
						$this2.addClass('has-content');
						var sectionName = datasection +" ."+tab_id;
						getContentTab(url,"."+ datasection+" ."+tab_id, sectionName);
					}
				});
			});
			function getContentTab(url,selector, sectionName){
				url = url+"?view=ajaxload";
				var loading = '<div class="a-center"><img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/rolling.svg?1671239087510" alt="loading"/></div>';
				$.ajax({
					type: 'GET',
					url: url,
					beforeSend: function() {
						$(selector).html(loading);
					},
					success: function(data) {
						var content = $(data);
						setTimeout(function(){
							$(selector).html(content.html());
							ajaxSwiper(selector);
							callbackFuncGroup(sectionName);
						},500);
					},
					error: function(err){
						$(selector).html('<p class="a-center margin-0 padding-0">Danh mục đang cập nhật sản phẩm</p>');
					},
					dataType: "html"
				});
			}
			$(".not-dqtab3").each( function(e){
				/*khai báo khởi tạo ban đầu cho 2 kiểu tab*/
				var $this1 = $(this);
				var $this2 = $(this);
				var datasection = $this1.closest('.not-dqtab3').attr('data-section');
				$this1.find('.tabs-title .item:first-child').addClass('current');
				$this1.find('.tab-content').first().addClass('current');

				/*khai báo cho chức năng dành cho mobile tab*/
				var _this = $(this).find('.wrap_tab_index .title_module_main');
				var droptab = $(this).find('.link_tab_check_click_3');


				$this1.find('.tabtitle3.ajax .item').click(function(){
					var $this2 = $(this),
						tab_id = $this2.attr('data-tab'),
						url = $this2.attr('data-url');
					var etabs = $this2.closest('.e-tabs');
					etabs.find('.tab-viewall').attr('href',url);
					etabs.find('.tabs-title .item').removeClass('current');
					etabs.find('.tab-content').removeClass('current');
					$this2.addClass('current');

					etabs.find("."+tab_id).addClass('current');
					//Nếu đã load rồi thì không load nữa
					if(!$this2.hasClass('has-content')){
						$this2.addClass('has-content');
						var sectionName = datasection +" ."+tab_id;
						getContentTab3(url,"."+ datasection+" ."+tab_id, sectionName);
					}
				});


			});
			$(".not-dqtab4").each( function(e){
				/*khai báo khởi tạo ban đầu cho 2 kiểu tab*/
				var $this1 = $(this);
				var $this2 = $(this);
				var datasection = $this1.closest('.not-dqtab4').attr('data-section');
				$this1.find('.tabs-title .item:first-child').addClass('current');
				$this1.find('.tab-content').first().addClass('current');

				/*khai báo cho chức năng dành cho mobile tab*/
				var _this = $(this).find('.wrap_tab_index .title_module_main');
				var droptab = $(this).find('.link_tab_check_click_4');


				$this1.find('.tabtitle4.ajax .item').click(function(){
					var $this2 = $(this),
						tab_id = $this2.attr('data-tab'),
						url = $this2.attr('data-url');
					var etabs = $this2.closest('.e-tabs');
					etabs.find('.tab-viewall').attr('href',url);
					etabs.find('.tabs-title .item').removeClass('current');
					etabs.find('.tab-content').removeClass('current');
					$this2.addClass('current');

					etabs.find("."+tab_id).addClass('current');
					//Nếu đã load rồi thì không load nữa
					if(!$this2.hasClass('has-content')){
						$this2.addClass('has-content');
						getContentTab4(url,"."+ datasection+" ."+tab_id);
					}
				});


			});
			function getContentTab4(url,selector){
				url = url+"?view=ajaxblog";
				console.log(url, "BABABA");
				var loading = '<div class="a-center"><img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/rolling.svg?1671239087510" alt="loading"/></div>';
				$.ajax({
					type: 'GET',
					url: url,
					beforeSend: function() {
						$(selector).html(loading);
					},
					success: function(data) {
						var content = $(data);
						setTimeout(function(){
							$(selector).html(content.html());
							awe_lazyloadImage();
						},100);
					},
					error: function(err){
						$(selector).html('<p class="a-center margin-0 padding-0">Danh mục đang cập nhật bài viết</p>');
					},
					dataType: "html"
				});
			}
			function getContentTab3(url,selector, sectionName){
				url = url+"?view=ajaxload3";
				var loading = '<div class="a-center"><img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/rolling.svg?1671239087510" alt="loading"/></div>';
				$.ajax({
					type: 'GET',
					url: url,
					beforeSend: function() {
						$(selector).html(loading);
					},
					success: function(data) {
						var content = $(data);
						setTimeout(function(){
							$(selector).html(content.html());
							ajaxSwiper2(selector);
							callbackFuncGroup(sectionName);
						},100);
					},
					error: function(err){
						$(selector).html('<p class="a-center margin-0 padding-0">Danh mục đang cập nhật sản phẩm</p>');
					},
					dataType: "html"
				});
			}
			$(".not-dqtab2").each( function(e){
				/*khai báo khởi tạo ban đầu cho 2 kiểu tab*/
				var $this1 = $(this);
				var $this2 = $(this);
				var datasection = $this1.closest('.not-dqtab2').attr('data-section');
				$this1.find('.tabs-title .item:first-child').addClass('current');
				$this1.find('.tab-content').first().addClass('current');

				/*khai báo cho chức năng dành cho mobile tab*/
				var _this = $(this).find('.wrap_tab_index .title_module_main');
				var droptab = $(this).find('.link_tab_check_click_2');


				$this1.find('.tabtitle2.ajax .item').click(function(){
					var $this2 = $(this),
						tab_id = $this2.attr('data-tab'),
						url = $this2.attr('data-url');
					var etabs = $this2.closest('.e-tabs');
					etabs.find('.tab-viewall').attr('href',url);
					etabs.find('.tabs-title .item').removeClass('current');
					etabs.find('.tab-content').removeClass('current');
					$this2.addClass('current');

					etabs.find("."+tab_id).addClass('current');
					//Nếu đã load rồi thì không load nữa
					if(!$this2.hasClass('has-content')){
						$this2.addClass('has-content');
						var sectionName = datasection +" ."+tab_id;
						getContentTab2(url,"."+ datasection+" ."+tab_id, sectionName);
					}
				});


			});
			function getContentTab2(url,selector, sectionName){
				url = url+"?view=ajaxload2";
				var loading = '<div class="a-center"><img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/rolling.svg?1671239087510" alt="loading"/></div>';
				$.ajax({
					type: 'GET',
					url: url,
					beforeSend: function() {
						$(selector).html(loading);
					},
					success: function(data) {
						var content = $(data);
						setTimeout(function(){
							$(selector).html(content.html());
							callbackFuncGroup(sectionName);
						},200);
					},
					error: function(err){
						$(selector).html('<p class="a-center margin-0 padding-0">Danh mục đang cập nhật sản phẩm</p>');
					},
					dataType: "html"
				});
			}
			(function($){
				"user strict";
				$.fn.Dqdt_CountDown = function( options ) {
					return this.each(function() {
						new  $.Dqdt_CountDown( this, options );
					});
				}
				$.Dqdt_CountDown = function( obj, options ){
					this.options = $.extend({
						autoStart			: true,
						LeadingZero:true,
						DisplayFormat:"<div><span>%%D%%</span> Days</div><div><span>%%H%%</span> Hours</div><div><span>%%M%%</span> Mins</div><div><span>%%S%%</span> Secs</div>",
						FinishMessage:"hết hạn",
						CountActive:true,
						TargetDate:null
					}, options || {} );
					if( this.options.TargetDate == null || this.options.TargetDate == '' ){
						return ;
					}
					this.timer  = null;
					this.element = obj;
					this.CountStepper = -1;
					this.CountStepper = Math.ceil(this.CountStepper);
					this.SetTimeOutPeriod = (Math.abs(this.CountStepper)-1)*1000 + 990;
					var dthen = new Date(this.options.TargetDate);
					var dnow = new Date();
					if( this.CountStepper > 0 ) {
						ddiff = new Date(dnow-dthen);
					}
					else {
						ddiff = new Date(dthen-dnow);
					}
					gsecs = Math.floor(ddiff.valueOf()/1000);
					this.CountBack(gsecs, this);
				};
				$.Dqdt_CountDown.fn =  $.Dqdt_CountDown.prototype;
				$.Dqdt_CountDown.fn.extend =  $.Dqdt_CountDown.extend = $.extend;
				$.Dqdt_CountDown.fn.extend({
					calculateDate:function( secs, num1, num2 ){
						var s = ((Math.floor(secs/num1))%num2).toString();
						if ( this.options.LeadingZero && s.length < 2) {
							s = "0" + s;
						}
						return "<b>" + s + "</b>";
					},
					CountBack:function( secs, self ){
						if (secs < 0) {
							self.element.innerHTML = '<div class="lof-labelexpired"> '+self.options.FinishMessage+"</div>";
							return;
						}
						clearInterval(self.timer);
						DisplayStr = self.options.DisplayFormat.replace(/%%D%%/g, self.calculateDate( secs,86400,365) );
						DisplayStr = DisplayStr.replace(/%%H%%/g, self.calculateDate(secs,3600,24));
						DisplayStr = DisplayStr.replace(/%%M%%/g, self.calculateDate(secs,60,60));
						DisplayStr = DisplayStr.replace(/%%S%%/g, self.calculateDate(secs,1,60));
						self.element.innerHTML = DisplayStr;
						if (self.options.CountActive) {
							self.timer = null;
							self.timer =  setTimeout( function(){
								self.CountBack((secs+self.CountStepper),self);
							},( self.SetTimeOutPeriod ) );
						}
					}
				});
				$(document).ready(function(){
					$('[data-countdown="countdown"]').each(function(index, el) {
						var $this = $(this);
						var $date = $this.data('date').split("-");
						$this.Dqdt_CountDown({
							TargetDate:$date[0]+"/"+$date[1]+"/"+$date[2]+" "+$date[3]+":"+$date[4]+":"+$date[5],
							DisplayFormat:"<div class=\"block-timer\"><p>%%D%%</p><span class='infodate'>Ngày</span></div><div class=\"block-timer\"><p>%%H%%</p><span class='infodate'>Giờ</span></div><div class=\"block-timer\"><p>%%M%%</p><span class='infodate'>Phút</span></div><div class=\"block-timer\"><p>%%S%%</p><span class='infodate'>Giây</span></div>",
							FinishMessage: "Chương trình đã hết hạn"
						});
					});
				});
			})(jQuery);
		}
	}catch(e){
		console.log(e);
	}
});
function ajaxSwiper(selector,dataLgg){
	$(selector+' .swiper-nth').each( function(){
		var swi_first_pro = null;
		function initSwiperFirst() {
			swi_first_pro = new Swiper('.swiper-nth', {
				slidesPerView: 3,
				spaceBetween: 15,
				slidesPerColumn: 2,
				slidesPerColumnFill: 'row',
				navigation: {
					nextEl: '.swiper-nth .swiper-button-next',
					prevEl: '.swiper-nth .swiper-button-prev',
				},
				breakpoints: {
					300: {
						slidesPerView: 2,
						slidesPerColumn: 2,
						spaceBetween: 10
					},
					767: {
						slidesPerView: 2,
						slidesPerColumn: 2,
						spaceBetween: 20
					},
					768: {
						slidesPerView: 3,
						spaceBetween: 20
					},
					1024: {
						slidesPerView: 3,
						spaceBetween: 20
					},
					1200: {
						slidesPerView: 3,
						spaceBetween: 20
					}
				}
			});
		}
		function destroySwiperFirst() {
			if (swi_first_pro) {
				swi_first_pro.destroy(true, true);
				swi_first_pro = null;
			}
		}
		function toggleSwiperFirst() {
			if ($(window).width() <= 767 && swi_first_pro) {
				destroySwiperFirst();
			} else if ($(window).width() > 767 && !swi_first_pro) {
				initSwiperFirst();
			}
		}
		toggleSwiperFirst();
		$(window).resize(toggleSwiperFirst);
	})
}
function ajaxSwiper2(selector,dataLgg){
	$(selector+' .swiper-three').each( function(){
		var swi_three_pro = null;
		function initSwiperThree() {
			swi_three_pro = new Swiper('.swiper-three', {
				slidesPerView: 5,
				spaceBetween: 15,
				slidesPerGroup: 1,
				navigation: {
					nextEl: '.swiper-three .swiper-button-next',
					prevEl: '.swiper-three .swiper-button-prev',
				},
				breakpoints: {
					280: {
						slidesPerView: 2,
						spaceBetween: 10
					},
					640: {
						slidesPerView: 2,
						spaceBetween: 10
					},
					768: {
						slidesPerView: 3,
						spaceBetween: 20
					},
					992: {
						slidesPerView: 4,
						spaceBetween: 20
					},
					1024: {
						slidesPerView: 4,
						spaceBetween: 20
					},
					1199: {
						slidesPerView: 5,
						spaceBetween: 20
					}
				}
			});
		}
		function destroySwiperThree() {
			if (swi_three_pro) {
				swi_three_pro.destroy(true, true);
				swi_three_pro = null;
			}
		}
		function toggleSwiperThree() {
			if ($(window).width() <= 767 && swi_three_pro) {
				destroySwiperThree();
			} else if ($(window).width() > 767 && !swi_three_pro) {
				initSwiperThree();
			}
		}
		toggleSwiperThree();
		$(window).resize(toggleSwiperThree);
	})
}
function callbackFuncGroup(sectionName) {
	setTimeout(function(){
		awe_lazyloadImage();
		// $(`.${sectionName} .add_to_cart`).click(function(e){
		// 	e.preventDefault();
			// var $this = $(this);
			// var form = $this.parents('form');
			// $.ajax({
			// 	type: 'POST',
			// 	url: '/cart/add.js',
			// 	async: false,
			// 	data: form.serialize(),
			// 	dataType: 'json',
			// 	beforeSend: function() { },
			// 	success: function(line_item) {
			// 		ajaxCart.load();
			// 		AddCartMobile(line_item);
			// 	},
			// 	cache: false
			// });
        //     $('.popup-cart-mobile, .backdrop__body-backdrop___1rvky').addClass('active');
		// });



		$(document).ready(function () {
			var modal = $('.quickview-product');
			var btn = $('.quick-view');
			var span = $('.quickview-close');
			btn.click(function () {
				modal.show();
			});
			span.click(function () {
				modal.hide();
			});
			$(window).on('click', function (e) {
				if ($(e.target).is('.modal')) {
					modal.hide();
				}
			});
		});

		if(window.BPR && window.BPR.loadBadges){
			window.BPR.initDomEls()
			window.BPR.loadBadges()
		}
	},200);

}
function lazyBlockProduct(sectionName, rootMargin, callback) {
	var section = $('.' + sectionName);
	var template = $('script[data-template="' + sectionName + '"]').html();
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(entry) {
			if (entry.isIntersecting) {
				$('div[data-section="' + sectionName + '"]', entry.target).html(template);
				observer.unobserve(entry.target);
				callbackFuncGroup(sectionName);
				if (typeof callback === 'function') {
					callback();
				}
			}
		});
	}, { rootMargin: rootMargin });
	observer.observe(section.get(0));
}