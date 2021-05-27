var canvas = document.getElementById('canvas');

var engine = new Engine();

engine.setCanvas(canvas);

engine.init();

canvas.addEventListener(
	'mousedown',
	function (event) {
		engine.onMouseClick(event);
	},
	false
);

canvas.addEventListener(
	'mousemove',
	function (event) {
		engine.onMouseMove(event);
	},
	false
);

window.addEventListener(
	'keydown',
	function (event) {
		engine.onButtonClick(event);
	},
	false
);

engine.toggleObserverState(true);

observer = function (id) {
	window.alert('Clicked ' + id);
};

engine.setObserver(observer);