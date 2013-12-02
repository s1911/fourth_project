<!--main_ser.php-->
<?php //include './_header.html'; ?>
<script type="text/javascript" src="./js/main_ser_action.js"></script>

<script type="text/javascript">
	loadAPI('http://www.google.com/jsapi?callback=loadVisual');

	function loadVisual()	{
		google.load('visualization', '1', {'packages':['corechart'], "callback" : loadPage});
	}
	
	function loadPage(){
		bid = <?php echo $_GET['bid']; ?>;
		drawComponentData(bid); 
	}
</script>
<div id="maintenance"></div>
<?php //include './_footer.html'; ?>