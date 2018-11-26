jQuery(document).ready(function ($) {

	var list = $(".front-page-list li");
	if ($(window).width() <= 576) {
		var numToShow = 25;
	} else {
		var numToShow = 75;
	}
	var button = $("#more");
	var numInList = list.length;
	list.hide();
	if (numInList > numToShow) {
		button.show();
	}
	list.slice(0, numToShow).show();

	button.click(function () {
		var showing = list.filter(':visible').length;
		list.slice(showing - 1, showing + numToShow).fadeIn();
		var nowShowing = list.filter(':visible').length;
		if (nowShowing >= numInList) {
			button.hide();
		}
	});

	base.searchBox.manipular();

	$('#mi-search').submit(function (e) {
		e.preventDefault();
		var val = $('#search-box__search').val();
		if (val) {
			window.location.href = museudoindio.search_target_url + '?search=' + val;
		}
		return;
	});

	if ($("span[id*='more']")) {
		var classP = $("span[id*='more-']")[0].parentElement.parentElement;
		classP.classList.add('readmoreText');
		var classC = $("span[id*='more-']");
		var elementHeight = classC[0].offsetTop - classP.offsetTop;

		$('.readmoreText').readmore({
			collapsedHeight: elementHeight + 5
		});

	}
	/* $('.mindio-truncate').readmore({
	collapsedHeight: 215
	}); jQuery('body').find('a.more-link')[0].parentElement.parentElement.className;*/

});

var base = {
	searchBox: {
		manipular: function () {
			var _form = jQuery('.search-box');

			_form
				.find('button[type=submit]')
				.on('click', function () {
					// Se o form está fechado, o clique abre o formulário
					if (!_form.hasClass('active')) {
						_form.addClass('active');

						return false;
					} else {
						// Se o campo estiver vazio, o clique no botão fecha o form novamente
						var campo = _form.find('input[type=text]').val();
						if (campo == '') {
							_form.removeClass('active');

							return false;
						}
					}
				});

			jQuery('#search-box__search').on('focus', function () {
				_form.addClass('active');
			});
		}
	}
}