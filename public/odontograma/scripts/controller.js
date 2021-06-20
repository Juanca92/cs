app.controller('dientes', [
	'$scope',
	function ($scope) {
		var jsonArmado;
		imagenAdultoArriva = [
			'/odontograma/images/dentadura-sup-18.png',
			'/odontograma/images/dentadura-sup-17.png',
			'/odontograma/images/dentadura-sup-16.png',
			'/odontograma/images/dentadura-sup-15.png',
			'/odontograma/images/dentadura-sup-14.png',
			'/odontograma/images/dentadura-sup-13.png',
			'/odontograma/images/dentadura-sup-12.png',
			'/odontograma/images/dentadura-sup-11.png',
			'/odontograma/images/dentadura-sup-21.png',
			'/odontograma/images/dentadura-sup-22.png',
			'/odontograma/images/dentadura-sup-23.png',
			'/odontograma/images/dentadura-sup-24.png',
			'/odontograma/images/dentadura-sup-25.png',
			'/odontograma/images/dentadura-sup-26.png',
			'/odontograma/images/dentadura-sup-27.png',
			'/odontograma/images/dentadura-sup-28.png',
		];

		var adultoArriva = [];
		var j = 0;
		for (var i = 1; i < 17; i++) {
			if (i > 3 && i < 14) {
				jsonArmado = { id: i, tipoDiente: 'decidua mixta', imagenDiente: `${window.location.origin}${imagenAdultoArriva[j++]}` };
				adultoArriva.push(jsonArmado);
			} else {
				jsonArmado = { id: i, tipoDiente: 'decidua', imagenDiente: `${window.location.origin}${imagenAdultoArriva[j++]}` };
				adultoArriva.push(jsonArmado);
			}
		}
		$scope.adultoArriva = adultoArriva;
		var imagenAdultoAbajo = [
			'/odontograma/images/dentadura-inf-48.png',
			'/odontograma/images/dentadura-inf-47.png',
			'/odontograma/images/dentadura-inf-46.png',
			'/odontograma/images/dentadura-inf-45.png',
			'/odontograma/images/dentadura-inf-44.png',
			'/odontograma/images/dentadura-inf-43.png',
			'/odontograma/images/dentadura-inf-42.png',
			'/odontograma/images/dentadura-inf-41.png',
			'/odontograma/images/dentadura-inf-31.png',
			'/odontograma/images/dentadura-inf-32.png',
			'/odontograma/images/dentadura-inf-33.png',
			'/odontograma/images/dentadura-inf-34.png',
			'/odontograma/images/dentadura-inf-35.png',
			'/odontograma/images/dentadura-inf-36.png',
			'/odontograma/images/dentadura-inf-37.png',
			'/odontograma/images/dentadura-inf-38.png',
		];
		var adultoAbajo = [];
		j = 0;
		for (var i = 17; i < 33; i++) {
			if (i > 19 && i < 30) {
				jsonArmado = { id: i, tipoDiente: 'decidua mixta', imagenDiente: `${window.location.origin}${imagenAdultoAbajo[j++]}` };
				adultoAbajo.push(jsonArmado);
			} else {
				jsonArmado = { id: i, tipoDiente: 'decidua', imagenDiente: `${window.location.origin}${imagenAdultoAbajo[j++]}` };
				adultoAbajo.push(jsonArmado);
			}
		}
		$scope.adultoAbajo = adultoAbajo;

		imagenNinoArriba = [
		 '/odontograma/images/dentadura-sup-55.png',
		 '/odontograma/images/dentadura-sup-54.png',
		 '/odontograma/images/dentadura-sup-53.png', 
		 '/odontograma/images/dentadura-sup-52.png', 
		 '/odontograma/images/dentadura-sup-51.png', 
		 '/odontograma/images/dentadura-sup-61.png', 
		 '/odontograma/images/dentadura-sup-62.png', 
		 '/odontograma/images/dentadura-sup-63.png', 
		 '/odontograma/images/dentadura-sup-64.png', 
		 '/odontograma/images/dentadura-sup-65.png'];
		j = 0;
		var ninoArriva = [];
		for (var i = 33; i < 43; i++) {
			jsonArmado = { id: i, tipoDiente: 'nino', imagenDiente: `${window.location.origin}${imagenNinoArriba[j++]}` };
			ninoArriva.push(jsonArmado);
		}
		$scope.ninoArriva = ninoArriva;

		imagenNinoAbajo = [
			'/odontograma/images/dentadura-inf-85.png', 
			'/odontograma/images/dentadura-inf-84.png', 
			'/odontograma/images/dentadura-inf-83.png', 
			'/odontograma/images/dentadura-inf-82.png', 
			'/odontograma/images/dentadura-inf-81.png', 
			'/odontograma/images/dentadura-inf-71.png', 
			'/odontograma/images/dentadura-inf-72.png', 
			'/odontograma/images/dentadura-inf-73.png', 
			'/odontograma/images/dentadura-inf-74.png', 
			'/odontograma/images/dentadura-inf-75.png'];
		j = 0;
		var ninoAbajo = [];
		for (var i = 43; i < 53; i++) {
			jsonArmado = { id: i, tipoDiente: 'nino', imagenDiente: `${window.location.origin}${imagenNinoAbajo[j++]}` };
			ninoAbajo.push(jsonArmado);
		}
		$scope.ninoAbajo = ninoAbajo;
	},
]);
