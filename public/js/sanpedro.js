window.loading = $('#preloader').show();
$(window).on('load', function () {
	loading.hide();
});

$(document)
	.ajaxStart(function () {
		loading.show();
	})
	.ajaxStop(function () {
		loading.hide();
	})
	.ready(function () {
		$('div.sidebar').on('click', 'a.menu--link', function (event) {
  			event.preventDefault();
			event.stopPropagation();
			var content = $('.' + (event.target.getAttribute('data-dest') === null ? 'content-wrapper' : event.target.getAttribute('data-dest')));
			var url = $(this).attr('href');
			if (url.substring(0, window.location.origin.length) === window.location.origin) {
				url = url.substring(window.location.origin.length + 1);
			}
			// if (url.substring(0, 17) === 'https://cs.sanpedro.com') {
			// 	url = url.substring(18);
			// }
			if (url !== '' && url !== '/') {
				$.ajax({
					method: 'post',
					url: (url.substring(0, 1) === '/' ? '' : '/') + url,
				}).done(function (resultado) {					
					content.hide(0).html(resultado).fadeIn('slow');
					$('#toggleMenu').click();
				});
			} else {
				content.html('<div class="alert alert-warning"><i class="fa fa-warning"></i> No se encuentra disponible el contenido solicitado.</div>');
			}
			if (screen.width < 768) {
				$('.mainnav-toggle').click();
			}
		});

		window.parametrosModal = function (idModal, titulo, tamano, onEscape, backdrop) {
			$(idModal + '-title').html(titulo);
			$(idModal + '-dialog').removeClass('modal-lg');
			$(idModal + '-dialog').removeClass('modal-xl');
			$(idModal + '-dialog').addClass(tamano);
			$(idModal).modal({
				backdrop: backdrop,
				keyboard: onEscape,
				focus: true,
				show: true,
			});
		};
		window.retornarCookie = function (nombre) {
			const value = `; ${document.cookie}`;
			const parts = value.split(`; ${nombre}=`);
			if (parts.length === 2) return parts.pop().split(';').shift();
			else return null;
		};
		window.agregarCookie = function (nombre, valor, dias) {
			var expires = '';
			if (dias) {
				var date = new Date();
				date.setTime(date.getTime() + dias * 24 * 60 * 60 * 1000);
				expires = '; expires=' + date.toUTCString();
			}
			document.cookie = nombre + '=' + (valor || '45') + expires + '; path=/';
			console.log(valor);
			console.log(nombre);
			console.log(dias);
		};

		window.mensajeAlert = function (tipo, mensaje, titulo) {
			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
			toastr[tipo](mensaje, titulo);

		}

	})
	.on('keydown', function (e) {
		if ((e.which || e.keyCode) === 116) e.preventDefault();
	});

setInterval(function() {
	const ahora = new Date();
	$("label#ahora").html(
		'<i class="fa fa-clock"></i> ' +
		(ahora.getHours() < 10 ? "0" : "") +
		ahora.getHours() +
		":" +
		(ahora.getMinutes() < 10 ? "0" : "") +
		ahora.getMinutes() +
		":" +
		(ahora.getSeconds() < 10 ? "0" : "") +
		ahora.getSeconds()
	);
}, 1000);