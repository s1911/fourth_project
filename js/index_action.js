$(function(){
	$('#data-dialog').dialog({
		autoOpen: false,
		show: {	effect: 'fade'},
		hide: {	effect: 'fade'},
		height: 140,
		modal: true
	});
	//$('#board-operation a').click(function(e){
	$('#menu a').click(function(e){
		$('#content').hide().load($(this).attr('href'), function(){
			$('#content').show();
		});
		return false;
	});
});

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(24.968436, 121.19589),
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById('board-map'), mapOptions);

	var drawingManager = new google.maps.drawing.DrawingManager({
								drawingMode: google.maps.drawing.OverlayType.MARKER,
								drawingControl: true,
								drawingControlOptions: {
								position: google.maps.ControlPosition.TOP_CENTER,
								drawingModes: [
									google.maps.drawing.OverlayType.MARKER
								]
							}
							/*,
							markerOptions: {
								icon: 'image/test.png'
							}*/
						});
	drawingManager.setMap(map);
}
