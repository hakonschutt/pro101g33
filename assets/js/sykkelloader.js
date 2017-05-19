$(function() {
	$callWrappers = $('.CallWrapper');

	$callWrappers.on("click", function (e){
		 var $_this = $(this);

		 var $byLoader = $('.byLoader', $_this.parent());
		 
		 var url = $byLoader.attr("data-api-path");

		 $byLoader.html('<div class="loadWrapper"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></div>');
		 $.get(url, function (data) {
		 	$byLoader.html(data);
		 });
	});
}());