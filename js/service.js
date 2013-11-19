/* service.js */

/* do ajax and communicate to server*/
/* http://api.jquery.com/jQuery.ajax/ */
/*	success(PlainObject data, String textStatus, jqXHR jqXHR)
	error(jqXHR jqXHR, String textStatus, String errorThrown)
*/
function commuService(url, ser_class_name, ser_name, req_arr, callback) {
	var URL = url + ser_name;
	$.ajax({
        type : "POST",
        url : URL,
        data : callService(ser_class_name, ser_name, req_arr),
        contentType : "application/soap+xml",
        dataType : "xml",
        success : function(data, status, xhr) {
			/* filtered data: {ser_name : ser_name,
							   content: [{name, value}]}*/
			/* EX: responce:
				<rci:Result>SEMA_OK</rci:Result>
				<rci:ServiceStatus>SEMA_SERVICE_STOP</rci:ServiceStatus>
				filtered data = {ser_name : ser_name,
								 content: [{name:  "Result",
											value: "SEMA_OK"},
										   {name:  "ServiceStatus",
										    value: "SEMA_SERVICE_STOP"}]}
			*/
			var filtered_data = filterData(ser_name, data);
			callback(filtered_data);
        },
        error : function(xhr, status, msg) {
		}
    });
}

/* return a string of xml form */
function callService(ser_class_name, ser_name, req_arr) {
	var data;
	data = '<?xml version="1.0" encoding="utf-8"?>';
    data += '<soapenv:Envelope xmlns:soapenv="http://www.w3.org/2003/05/soap-envelope">';
    data += '<soapenv:Header/><soapenv:Body>';
    data += '<ns:' + ser_name + ' xmlns:ns="http://ws.apache.org/axis2/services/' + ser_class_name + '">';
    if( req_arr != null ) {
        for(var i = 0;i<req_arr.length;i++)
			data += '<ns:' + req_arr[i].ns_id + '>' + req_arr[i].par + '</ns:' + req_arr[i].ns_id + '>';
    }
    data += '</ns:'+ser_name+'>';
    data += '</soapenv:Body>';
    data += '</soapenv:Envelope>';
	return data;
}

/* 過濾不需要的資料 */
function filterData(ser_name, data) {
	var result = {};
	var content_arr = [];
	{
		//IE9.0 do not have children...
		//data["childNodes"][0] -> soapenv:envelop
		//data["childNodes"][0]["childNodes"][0] -> soapenv:body
		//data["childNodes"][0]["childNodes"][0]["childNodes"][0] -> rci:getstate	//ser_neme
		var data_node = data["childNodes"][0]["childNodes"][0]["childNodes"][0]["childNodes"];
		for(var i=0;i<data_node.length;++i){
			var temp = {};
			temp.name = data_node[i].localName;
			temp.value = data_node[i].textContent;
			content_arr.push(temp);
		}
	}
	result.ser_name = ser_name;
	result.content = content_arr;
	return result;
}