<!--index.php-->
<?php include './_header.html' ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=drawing"></script>
<script type="text/javascript" src="./js/index_action.js"></script>
<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="data-dialog"></div>
<div id="container">
	<div id="header"><h1><a href="./index.php">工業電腦視覺化管理系統</a></h1></div>
	<div id="main">
		<div id="menu">
			<ul id="board-operation">
				<li><a href="./add_board.html"><img src="./image/add.png" alt="add"></a></li>
				<li><a href="./edit_board.php?bid=1"><img src="./image/edit.png" alt="edit"></a></li>
			</ul>
			<div id="board-menu">
				<table id="boards">
					<tr>
						<th>Name</th>
					</tr>
					<?php include './model/get_board.php' ?>
				</table>
			</div>
		</div>			<!-- end of menu-->
		<div  id="content">
			<div id="board-map"></div>
		</div>			<!-- end of content-->
	</div>				<!--end of main-->
	<div id="footer">國立中央大學資訊工程學系102學年度</div>
</div>				<!--end of container-->
<?php include './_footer.html' ?>
