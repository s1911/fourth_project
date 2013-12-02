/*action.js*/

function loadAPI(url) {
	var script = document.createElement('script');
	script.src = url;
	script.type = 'text/javascript';
	document.getElementsByTagName("head")[0].appendChild(script);
}