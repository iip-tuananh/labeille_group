initQuickView();
var product = {};
var currentLinkQuickView = '';
var option1 = '';
var option2 = '';
function setButtonNavQuickview() {
	$("#quickview-nav-button a").hide();
	$("#quickview-nav-button a").attr("data-index", "");
	var listProducts = $(currentLinkQuickView).closest(".slide").find("a.quick-view");
	if(listProducts.length > 0) {
		var currentPosition = 0;
		for(var i = 0; i < listProducts.length; i++) {
			if($(listProducts[i]).data("handle") == $(currentLinkQuickView).data("handle")) {
				currentPosition = i;
				break;
			}
		}
		if(currentPosition < listProducts.length - 1) {
			$("#quickview-nav-button .btn-next-product").show();
			$("#quickview-nav-button .btn-next-product").attr("data-index", currentPosition + 1);
		}
		if(currentPosition > 0) {
			$("#quickview-nav-button .btn-previous-product").show();
			$("#quickview-nav-button .btn-previous-product").attr("data-index", currentPosition - 1);
		}
	}
	$("#quickview-nav-button a").click(function() {
		$("#quickview-nav-button a").hide();
		var indexLink = parseInt($(this).data("index"));
		if(!isNaN(indexLink) && indexLink >= 0) {
			var listProducts = $(currentLinkQuickView).closest(".slide").find("a.quick-view");
			if(listProducts.length > 0 && indexLink < listProducts.length) {
				//$(".quickview-close").trigger("click");
				$(listProducts[indexLink]).trigger("click");
			}
		}
	});
}
function initQuickView(){

	$(document).on("click", "#thumblist_quickview li", function() {
		changeImageQuickView($(this).find("img:first-child"), ".product-featured-image-quickview");
		$('#thumblist_quickview li').removeClass('active');
		$(this).addClass('active');
	});
	$(document).on('click', '.quick-view', function(e) {
		if($(window).width() > 1025){
			e.preventDefault();
			$('.soluong1').show();
			var producthandle = $(this).data("handle");
			currentLinkQuickView = $(this);
				var numInput = document.querySelector('.quantity_wanted_p input');
				numInput.addEventListener('input', function(){
					// Let's match only digits.
					var num = this.value.match(/^\d+$/);
					if (num === null) {
						// If we have no match, value will be empty.
						this.value = "";
					}
					if (num ==0) {
						// If we have no match, value will be empty.
						this.value = 1;
					}
				}, false)

				return false;
			}
							  });


		}

		function loadQuickViewSlider(n, r) {
			productImage();

			var loadingImgQuickView = $('.loading-imgquickview');

			r.find(".quickview-featured-image").append('<a href="' + n.url + '"><img src="' + s + '" title="Ảnh sản phẩm"/><div style="height: 100%; width: 100%; top:0; left:0 z-index: 2000; position: absolute; display: none; background: url(' + window.loading_url + ') 50% 50% no-repeat;"></div></a>');
			if (n.images.length > 1) {
				$('.thumbs_quickview').addClass('thumbs_list_quickview');
				var o = r.find(".more-view-wrapper ul");
				for (i in n.images) {
					var f = '<li class="swiper-slide"><a href="javascript:void(0)" data-imageid="' + n.id + '"" data-zoom-image="' + u + '"  ><img src="' + u + '" alt="Ảnh sản phẩm" style="max-width:120px; max-height:120px;" /></a></li>';
					o.append(f)
				}
				o.find("a").click(function() {
					var t = r.find("#product-featured-image-quickview");
					if (t.attr("src") != $(this).attr("data-image")) {
						t.attr("src", $(this).attr("data-image"));
						loadingImgQuickView.show();
						t.load(function(t) {
							loadingImgQuickView.hide();
							$(this).unbind("load");
							loadingImgQuickView.hide()
						})
					}
				});
				var swiper = new Swiper('#thumbs_list_quickview', {
					slidesPerView: 3,
					spaceBetween: 15,
					slidesPerGroup: 1,
					pagination: {
						el: '#thumbs_list_quickview .swiper-pagination',
						clickable: true,
					},
					navigation: {
						nextEl: '#thumbs_list_quickview .swiper-button-next',
						prevEl: '#thumbs_list_quickview .swiper-button-prev',
					},
					breakpoints: {
						300: {
							slidesPerView: 'auto',
							spaceBetween: 5
						},
						640: {
							slidesPerView: 2,
							spaceBetween: 5
						},
						768: {
							slidesPerView: 2,
							spaceBetween: 10
						},
						1024: {
							slidesPerView: 3,
							spaceBetween: 10
						},
						1200: {
							slidesPerView: 3,
							spaceBetween: 10
						}
					}
				});
				$('.more-view-wrapper').removeClass('d-none');
			} else {
				$('.more-view-wrapper').addClass('d-none');
			}
			//if($('.thumbs_quickview .swiper-slide').length > 0){
			//	$('.more-view-wrapper').removeClass('d-none');
			//}else{
			//	$('.more-view-wrapper').addClass('d-none');
			//}

			//if($('#thumblist_quickview').html().trim() == ''){
			//	$('.more-view-wrapper').addClass('d-none');
			//}else{
			//$('.more-view-wrapper').removeClass('d-none');
			//}
		}
		function quickViewVariantsSwatch(t, quickview) {


			var v = '<input type="hidden" name="id" value="' + t.id + '">';
			quickview.find("form.variants").append(v);
			if (t.variants.length > 1) {
				for (var r = 0; r < t.variants.length; r++) {
					var i = t.variants[r];
					var s = '<option value="' + i.id + '">' + i.title + "</option>";
					quickview.find("form.variants > select").append(s)
				}


				var ps = "product-select-" + t.id;

				if (t.options.length == 1) {

					quickview.find(".selector-wrapper:eq(0)").prepend("<label>" + t.options[0].name + "</label>")
				}

				var options="";
				for (var i = 0; i < t.options.length; i++) {
					options += '<div class="swatch clearfix" data-option-index="' + i + '">';
					options += '<div class="header">' + t.options[i].name + ': </div>';
					var is_color = false;
					if (/Color|Colour|Màu/i.test(t.options[i].name)) {
						is_color = true;
					}
					var optionValues = new Array();
					for (var j = 0; j < t.variants.length; j++) {
						var variant = t.variants[j];
						var value = variant.options[i];
						var valueHandle = awe_convertVietnamese(value);

						var forText = 'swatch-' + i + '-' + valueHandle;
						if (optionValues.indexOf(value) < 0) {
							//not yet inserted
							if(variant.featured_image != null){
								options += '<div data-image="'+variant.featured_image.src+'" data-value="' + value + '" class="swatch-element ' + (is_color ? "color " : " ") + valueHandle + (variant.available ? ' available ' : ' soldout ') + '">';
							}else{
								options += '<div  data-value="' + value + '" class="swatch-element ' + (is_color ? "color " : " ") + valueHandle + (variant.available ? ' available ' : ' soldout ') + '">';
							}


							if (is_color) {
								options += '<div class="tooltip">' + value + '</div>';
							}
							options += '<input id="' + forText + '" type="radio" name="option-' + i + '" value="' + value + '" ' + (j == 0 ? ' checked ' : '') + (variant.available ? '' : '') + ' />';

							if (is_color) {
								if(variant.featured_image){
									options += '<label for="' + forText + '" class="'+valueHandle+'" style="background-color: ' + valueHandle + '"></label>';
								}else{
									options += '<label for="' + forText + '" class="'+valueHandle+'" style="background-color: ' + valueHandle + '"></label>';
								}
							} else {
								options += '<label for="' + forText + '">' + value + '</label>';
							}
							options += '</div>';

							if (variant.available) {
								//$('#quick-view-product .swatch[data-option-index="' + i + '"] .' + valueHandle).removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
							}
							optionValues.push(value);
						}
					}
					options += '</div>';
				}

				quickview.find('form.variants > select').after(options);
				var chon = [];
				var qmoney = [];
				var qimage = [];
				var qid = [];
				quickview.find('.swatch :radio').change(function() {
					var optionIndex = $(this).closest('.swatch').attr('data-option-index');
					var optionValue = $(this).val();
					$(this)
						.closest('form')
						.find('.single-option-selector')
						.eq(optionIndex)
						.val(optionValue)
						.trigger('change');

					var variant_id = $('.quickview-product select[name=id]').val();

					var check = false;
					for (var i = 0; i < qid.length; i++){
						if (qid[i] == variant_id){
							var quantity = parseInt($('.quickview-product input[name=quantity]').val());
							var totalPrice = qmoney[i] * quantity;

							var totalPriceHtml = $('.quickview-product .price').html();


							$('.quickview-product .total-price span').html(totalPriceText);
							$('.quickview-product .price').html(gia);
							currency();

							if(qimage[i]){
								$('.quickview-product .featured-image img').attr('src',qimage[i]);
							}


						}
					}
					for (var i = 0; i < chon.length; i++){


						if (chon[i] == variant_id){
							var check = true;
						}
						else{
						}
					}

					if(check == true){
						$('.quickview-product .btn-addToCart').attr('disabled','disabled');

						$(".quickview-product .btn-addToCart").removeAttr("disabled");
					}

				});

				quickview.find("form.variants .selector-wrapper label").each(function(n, r) {
					$(this).html(t.options[n].name)
				})
			}
			else {
				quickview.find("form.variants > select").remove();
				var q = '<input type="hidden" name="variantId" value="' + t.variants[0].id + '">';
				quickview.find("form.variants").append(q);
			}
		}
		function productImage() {
			var swiper = new Swiper('.thumbs_list_quickview', {
				slidesPerView: 3,
				spaceBetween: 43,
				slidesPerGroup: 2,
				pagination: {
					el: '.thumbs_list_quickview .swiper-pagination',
					clickable: true,
				},
				breakpoints: {
					300: {
						slidesPerView: 'auto',
						spaceBetween: 15
					},
					640: {
						slidesPerView: 3,
						spaceBetween: 15
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 30
					},
					1024: {
						slidesPerView: 3,
						spaceBetween: 30
					},
					1200: {
						slidesPerView: 3,
						spaceBetween: 43
					}
				}
			});

			if (!!$.prototype.fancybox){
				$('li:visible .fancybox, .fancybox.shown').fancybox({
					'hideOnContentClick': true,
					'openEffect'	: 'elastic',
					'closeEffect'	: 'elastic'
				});
			}
		}
		/* Quick View ADD TO CART */

		function updatePricingQuickView() {

			//Currency.convertAll(window.shop_currency, $("#currencies a.selected").data("currency"), "span.money", "money_format")


		}


		function validate(evt) {
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode( key );
			var regex = /[0-9]|\./;
			if( !regex.test(key) ) {
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
			}
		}

		$(document).on('click', '.quickview-close, #quick-view-product .quickview-overlay, .fancybox-overlay', function(e){
			$("#quick-view-product").fadeOut(0);
			awe_hidePopup();
		});

		// $(document).on('click', '.fix_add_to_cart', function(e) {
		// 	e.preventDefault();
		// 	$('#quick-view-product').hide();
		// 	var $this = $(this);
		// 	var form = $this.parents('form');
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: '/cart/add.js',
		// 		async: false,
		// 		data: form.serialize(),
		// 		dataType: 'json',
		// 		beforeSend: function() {
		// 		},
		// 		success: function(line_item) {
		// 			var qty = $('.quick-view-product').find('.prd_quantity').val();

		// 			$('.cart-popup-name').html(line_item.title).attr('href', line_item.url, 'title', line_item.title);
		// 			ajaxCart.load();
		// 			console.log(qty, 'sl');
		// 			if ((typeof callback) === 'function') {
		// 				callback(line_item, form);
		// 				$('#popup-cart-mobile, .backdrop__body-backdrop___1rvky').addClass('active');
		// 			}
		// 			else {
		// 				$('#popup-cart-mobile, .backdrop__body-backdrop___1rvky').addClass('active');
		// 				AddCartMobile(line_item, qty);
		// 			}
		// 		},
		// 		cache: false
		// 	});
		// });



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