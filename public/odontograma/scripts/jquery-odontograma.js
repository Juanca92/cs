//datos de prueba
var color = 1;
var datos = [
	{ diente: 1, cara: 1, estado: 8, tipo: 1 },
	{ diente: 2, cara: 2, estado: 2, tipo: 1 },
	{ diente: 2, cara: 5, estado: 1, tipo: 1 },
	{ diente: 3, cara: 2, estado: 6, tipo: 1 },
	{ diente: 4, cara: 2, estado: 4, tipo: 1 },
];

$(document).ready(function () {
	$('polygon').on('click', function () {
		var desabilitado = $(this).attr('class');
		if (desabilitado != 'desabilitado') {
			pintar(color, this);
		}
	});
	$('input:radio').change(function () {
		var tipo = $(this).attr('value');
		cambiarOdontograma(tipo);
	});

	$('.color').click(function () {
		color = $(this).attr('value');
	});

	cambiarOdontograma($('input:radio[name=tipo]:checked').val());
});

function activar_Desactivar_Dientes(lado, ad, valor) {
	if (ad == 1 && valor < 6) {
		$(lado).attr('class', 'diente');
	} else if (ad == 0 && valor < 6) {
		$(lado).attr('class', 'desabilitado');
	}
}

function cambiarOdontograma(tipo) {
	var valor = null;
	if (tipo == 1) {
		$('.decidua polygon').each(function () {
			valor = $(this).attr('value');
			activar_Desactivar_Dientes(this, 1, valor);
			quitarEspecial(this);
		});
		$('.nino polygon').each(function () {
			valor = $(this).attr('value');
			activar_Desactivar_Dientes(this, 0, valor);
			quitarEspecial(this);
		});
	} else if (tipo == 2) {
		$('.decidua polygon').each(function () {
			valor = $(this).attr('value');
			activar_Desactivar_Dientes(this, 0, valor);
			quitarEspecial(this);
		});
		$('.nino polygon').each(function () {
			valor = $(this).attr('value');
			activar_Desactivar_Dientes(this, 1, valor);
			quitarEspecial(this);
		});
	} else if (tipo == 3) {
		$('.decidua').each(function () {
			var id = $(this).attr('id');
			if ((id > 3 && id < 14) || (id > 19 && id < 30)) {
				$(this)
					.find('polygon')
					.each(function () {
						valor = $(this).attr('value');
						activar_Desactivar_Dientes(this, 0, valor);
						quitarEspecial(this);
					});
			} else {
				$(this)
					.find('polygon')
					.each(function () {
						valor = $(this).attr('value');
						activar_Desactivar_Dientes(this, 1, valor);
						quitarEspecial(this);
					});
			}
		});
		$('.nino polygon').each(function () {
			valor = $(this).attr('value');
			activar_Desactivar_Dientes(this, 1, valor);
			quitarEspecial(this);
		});
	}
}

function quitarEspecial(objeto) {
	$(objeto)
		.parent()
		.find('polygon')
		.each(function () {
			if ($(this).attr('value') >= 6 && $(this).attr('value') <= 7) {
				$(this).attr('class', 'ausente');
			} else if ($(this).attr('value') == 10) {
				$(this).attr('class', 'implante');
			}
		});
	$(objeto)
		.parent()
		.find('circle')
		.each(function () {
			if ($(this).attr('value') == 8) {
				$(this).attr('class', 'corona');
			} else if ($(this).attr('value') == 9) {
				$(this).attr('class', 'endodoncia');
			}
		});
}

function limpiarLados(objeto) {
	$(objeto)
		.parent()
		.find('polygon')
		.each(function () {
			if ($(this).attr('value') < 6) {
				$(this).attr({ class: 'diente', estado: 0 });
			}
		});
}
function guardar(color, objeto) {
	datos = JSON.parse(localStorage.getItem($($(objeto).parent()[0]).attr('id')));
	if (datos != null) {
		var pos = -1;
		$.each(datos, function (key, value) {
			if (value.split(',')[0] == $(objeto).attr('value')) {
				pos = key;
			}
		});
		if (pos != -1) {
			datos[pos] = `${$(objeto).attr('value')},${color}`;
		} else {
			datos.push(`${$(objeto).attr('value')},${color}`);
		}
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify(datos));
	} else {
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify([`${$(objeto).attr('value')},${color}`]));
	}
}
function pintar(color, objeto) {
	if (color == 1) {
		quitarEspecial(objeto);
		$(objeto).attr({ class: 'marcadoRojo marcado', estado: color });
		guardar(color, objeto);
	} else if (color == 2) {
		quitarEspecial(objeto);
		$(objeto).attr({ class: 'marcadoAmarillo marcado', estado: color });
		guardar(color, objeto);
	} else if (color == 3) {
		limpiarLados(objeto);
		quitarEspecial(objeto);
		$(objeto)
			.parent()
			.find('.endodoncia')
			.each(function () {
				$(this).attr({ class: 'marcadoNaranja marcado', estado: color });
			});
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify([`${$(objeto).attr('value')},${color}`]));
	} else if (color == 4) {
		limpiarLados(objeto);
		quitarEspecial(objeto);
		$(objeto)
			.parent()
			.find('.ausente')
			.each(function () {
				$(this).attr({ class: 'marcadoTomate marcado', estado: color });
			});
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify([`${$(objeto).attr('value')},${color}`]));
	} else if (color == 5) {
		quitarEspecial(objeto);
		$(objeto).attr({ class: 'marcadoMarron marcado', estado: color });
		guardar(color, objeto);
	} else if (color == 6) {
		limpiarLados(objeto);
		quitarEspecial(objeto);
		$(objeto)
			.parent()
			.find('.implante')
			.each(function () {
				$(this).attr({ class: 'marcadoMorado marcado', estado: color });
			});
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify([`${$(objeto).attr('value')},${color}`]));
	} else if (color == 7) {
		quitarEspecial(objeto);
		$(objeto).attr({ class: 'marcadoVerde marcado', estado: color });
		guardar(color, objeto);
	} else if (color == 8) {
		limpiarLados(objeto);
		quitarEspecial(objeto);
		$(objeto)
			.parent()
			.find('.corona')
			.each(function () {
				$(this).attr({ class: 'marcadoAzul marcado', estado: color });
			});
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify([`${$(objeto).attr('value')},${color}`]));
	} else if (color == 9) {
		quitarEspecial(objeto);
		$(objeto).attr({ class: 'diente', estado: color });
		eliminar(objeto);
	}
}
function eliminar(objeto) {
	datos = JSON.parse(localStorage.getItem($($(objeto).parent()[0]).attr('id')));
	if (datos != null) {
		var pos = -1;
		$.each(datos, function (key, value) {
			if (value.split(',')[0] == $(objeto).attr('value')) {
				pos = key;
			}
		});
		if (pos != -1) {
			datos.splice(pos, 1);
		}
		localStorage.setItem($($(objeto).parent()[0]).attr('id'), JSON.stringify(datos));
	}
}
