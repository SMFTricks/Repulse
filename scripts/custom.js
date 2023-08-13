$(function() {
	$(document).on('click', '.custom_search button', function(event) {

		if ($(window).width() > '767')
			return;

		if (!document.querySelector('.custom_search').classList.contains('active'))
		{
			event.preventDefault();
			$('.custom_search').toggleClass('active');
		}
		if (document.querySelector('.custom_search').classList.contains('active'))
		{
			$(document).keyup(function(e){
				if (e.keyCode == 27)
					$('.custom_search').removeClass('active')
			}).mouseup(function (e) {
				if ($('.custom_search').has(e.target).length === 0)
					$('.custom_search').removeClass('active')
			});
		}
	});
});