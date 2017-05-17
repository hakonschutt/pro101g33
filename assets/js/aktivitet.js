function aapne($id) {
    if ($($id).hasClass('aktiv')) {
        $($id).removeClass('aktiv');
        $($id).addClass('inaktiv');
        $('.act-div').removeClass('aktiv-d');
        $('.act-div').addClass('inaktiv-d');
    } else {
        $('.act-div-inner-right-box-inner').removeClass('aktiv');
        $('.act-div-inner-right-box-inner').addClass('inaktiv');
        $('.act-div').addClass('aktiv-d');
        $('.act-div').removeClass('inaktiv-d');
        $($id).removeClass('inaktiv');
        $($id).addClass('aktiv');
    }
}

function start($content) {
    if ($($content).hasClass('stopp')) {
        $($content).removeClass('stopp');
        $($content).addClass('start');
    } 
}

function on($act) {
    if ($($act).hasClass('off')) {
    	$('.act-div-inner').removeClass('on');
        $('.act-div-inner').addClass('off');
        $($act).removeClass('off');
        $($act).addClass('on');
    }
}