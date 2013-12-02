function drawComponentData(bid){
	$.ajax({
		url: './model/get_component.php?bid=' + bid,
		success: function(msg){
			var component_data = $.parseJSON(msg);
			setDIV(component_data);
			for(var i=0;i<component_data.length;++i){
				$.ajax({
					url: './model/returnsql_main.php',
					data: 'BCID=' + component_data[i]['bcid'],
					type: 'POST',
					async: false,
					success: function(info_msg){
						var component_info = $.parseJSON(info_msg);
						drawChart(component_info);
					}
				})
			}
		}
	});
}

function setDIV(component_data){
	var html_text = '<dl>';
	for(var i=0;i<component_data.length;++i) {
		html_text += '<dt class="line-chart-title">' + component_data[i]['cname'] + '</dt>';
		html_text += '<dd id="' + component_data[i]['cname'] + '" class="line-chart"></dd>';
	}
	html_text += '</dl>';
	$('div#maintenance').append(html_text);
}

function drawChart(component_info){
	var graphData = new google.visualization.DataTable();
	//https://developers.google.com/chart/interactive/docs/datatables_dataviews
	graphData.addColumn('datetime', 'time');
	graphData.addColumn('number', 'LifeTime');

	for(var i=0;i<component_info.length;++i)
		graphData.addRows([[ new Date(component_info[i]['save_t']), parseInt(component_info[i]['life_t']) ]]);
				
	//var options = { title: component_info[0]['cname']};
	var chart = new google.visualization.LineChart(document.getElementById(component_info[0]['cname']));
	chart.draw(graphData);
}
