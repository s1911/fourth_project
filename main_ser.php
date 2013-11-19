<!--main_ser.php-->
<?php// include './_header.html'; ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="./js/main_ser_action.js"></script>

<script type="text/javascript">
	google.load('visualization', '1', {'packages':['corechart']});
	google.setOnLoadCallback(loadPage);
	
	function loadPage(){
		bid = <?php echo $_GET['bid']; ?>;
		drawComponentData(bid);
	}
</script>
<div id="maintenance"></div>
<?php// include './_footer.html'; ?>