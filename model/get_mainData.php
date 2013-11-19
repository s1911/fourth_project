<form name='mainData' method='post' action='./model/insertsql_main.php'>
	<input type='hidden' name='BCID' value=''/>
	<input type='hidden' name='CName'  value=''/>
	<input type='hidden' name='DeploymentT' value=''/>
	<input type='hidden' name='LifeT' value=''/>
</form>
<script type='text/javascript' src='./js/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='./js/service.js'></script>
<script type='text/javascript'>

	commuService('SEMA_MaintenanceService', 'getState', [], printTable);
	commuService('SEMA_MaintenanceService', 'getNumOfComponents', [], printTable);
	commuService('SEMA_MaintenanceService', 'getComponentInfo', [], printTable);
	
	function printTable(data) {
		var table_string = '';
		if(data.content[0].value === 'SEMA_OK')
			for(var i=1;i<data.content.length;++i)
				table_string += '<tr><td>' + data.content[i].name + '</td><td>' + data.content[i].value + '</td></tr>';
		$('#main_ser').append(table_string);
		
		if (data.ser_name === 'getComponentInfo') {
			document.mainData.CID.value = data.content[1].value;
			document.mainData.CName.value = data.content[2].value;
			document.mainData.DeploymentT.value = data.content[3].value;
			document.mainData.LifeT.value = data.content[4].value;
			document.mainData.submit();
		}
	}
</script>
<table id='main_ser'></table>