$(function() {
	$transportWrappers = $('.transportCallWrapper');

	$transportWrappers.on("click", function (e){
		 var $_this = $(this);

		 var $stopLoader = $('.stopLoader', $_this.parent());
		 
		 var url = $stopLoader.attr("data-api-path");

		 $stopLoader.html('<div class="loadWrapper"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></div>');
		 $.get(url, function (data) {
		 	$stopLoader.html(data);
		 });
	});
}());