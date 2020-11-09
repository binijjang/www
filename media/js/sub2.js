$(document).ready(function () {
	$('#imgBG').attr('src', 'images/sub2_back.jpg');

	var screen_width = $(window).width();
	


	$(window).resize(function () {
		if (screen_width < 768) {
			$('.append_div').prependTo('.char2');
			$('.append_div').css({
				background: 'url(images/sub2_char2.jpg)',
				backgroundSize: "cover"
			});
			$('.char2 div:nth-of-type(2)').css('background', '#99cccc');

		}else if(screen_width > 768 ){
			$('.append_div').appendTo('.char2');
		}


	});



});
