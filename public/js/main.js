'use strict';

let navbar = document.querySelector('.header-section .main-menu')

if(navbar != null)
{
	document.querySelector('#nav-switch').onclick = () =>{
	  navbar.classList.add('active');
	}
}

let navbar1 = document.querySelector('.aheader-section .main-menu')

if(navbar1 != null)
{
	document.querySelector('#nav-switch').onclick = () =>{
	  navbar1.classList.add('active');
	}
}

$(window).on('load', function(){
	/*---- Preloader ----*/
	$(".loader").fadeOut();
	$("#preloader").delay(400).fadeOut("slow");
});

let registerBtn = document.querySelector(".modal .register-btn");
let loginBtn = document.querySelector(".modal .login-btn");

registerBtn.onclick = () =>{
  registerBtn.classList.add("active");
  loginBtn.classList.remove("active");
  document.querySelector(".modal .login-form").classList.remove("active");
  document.querySelector(".modal .register-form").classList.add("active");
};

loginBtn.onclick = () =>{
  registerBtn.classList.remove("active");
  loginBtn.classList.add("active");
  document.querySelector(".modal .login-form").classList.add("active");
  document.querySelector(".modal .register-form").classList.remove("active");
};

(function ($){
	/* toggle nav-switch-header section */
	$('.nav-switch').on('click', function(event){
		$(this).toggleClass('active');
		$('.but').slideToggle(400);
		event.preventDefault();
	});
	
	/* set background image - background section */
	$('.set-bg').each(function(){
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});
	
	/*Facts & Figures Section*/
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
	
	/* Progress Bar */
	$('.progress-bar-style').each (function(){
		var progress = $(this).data("progress");
		var bgcolor = $(this).data("bgcolor");
		var prog_width = progress + '%';
		if(progress <= 100){
			$(this).append('<div class="bar-inner" style="width:' + prog_width + '; background:' + bgcolor + ';"><span>' + prog_width + '</span></div>');
		}else{
			$(this).append('<div class="bar-inner" style="width:100%; background:' + bgcolor + ';"><span>100%</span></div>');
		}
	});
})(jQuery);

var swiper = new Swiper(".t-slider", {
  loop:true,
  grabCursor:true,
  spaceBetween: 10,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});