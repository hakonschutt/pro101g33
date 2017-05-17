
var $rightMenu = $('#menu');
var $leftMenu = $('#opacity');
var rightVal = parseInt($rightMenu.css('right'));
var leftVal = parseInt($leftMenu.css('left'));

$('#nav-icon').click(function(){
	$(this).toggleClass('open');
});	

$('#nav-icon').click(function () {
    animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
	$rightMenu.animate({
		right: animateRight + 'px'
    });

    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
	$leftMenu.animate({
		left: animateLeft + 'px'
    });

    return false; 
});

$('#opacity').click(function () {
	$('#nav-icon').toggleClass('open');

	animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
	$rightMenu.animate({
		right: animateRight + 'px'
    });

    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
	$leftMenu.animate({
		left: animateLeft + 'px'
    });

    return false; 
});

$('#navmenu').find('a').on('click', function (e) {
    var targetSec = $(this).text();
    //var targetSec = this.href;
   	//var targetSec = $('a').attr('href');
    //var targetSec = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $('#' + targetSec).offset().top - 50
    }, 1000);

    $('#nav-icon').toggleClass('open');

	animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
	$rightMenu.animate({
		right: animateRight + 'px'
    });

    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
	$leftMenu.animate({
		left: animateLeft + 'px'
    });
});

$(document).on("click", ".active", function (e) {
	e.preventDefault();
});