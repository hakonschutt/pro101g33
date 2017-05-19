$("#contactForm").on('submit', function(e) {
	e.preventDefault();
	var $this = $(this);

	var data = $this.serialize();
	console.log(data);
	var url = $this.attr("action");
	var btn = $('[type="submit"]', $this);
	var inputs = $('[type="text"]', $this);
	var email = $('[type="email"]', $this);
	var textarea = $('textarea', $this);

	inputs.val('');
	textarea.val('');
	email.val('');

	btn.prop("disabled", true).val("Sender...");
	$.post(url, data, function (res) {
		btn.prop("disabled", false).val("Send melding");
		var $successMsg = $('<div class="successMessage">Suksess, meldingen er sendt!</div>');
		$this.prepend($successMsg);
		setTimeout(function () {
			$successMsg.remove();
		}, 4000);
	});
});