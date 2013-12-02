function checkForm() {
	var loc_x = document.addBoard.location_x.value;
	var loc_y = document.addBoard.location_y.value;
	var _ip = document.addBoard.ip.value;
	
	if (document.addBoard.board_name.value == "") {
		alert("請輸入主機名稱");
		document.addBoard.board_name.focus();
		return false;
	}
	
	if (document.addBoard.location_x.value == "") {
		alert("請輸入經度");
		document.addBoard.location_x.focus();
		return false;
	}
	else {
		for (i=0; i<loc_x.length; i++) {
			if (!((loc_x.charAt(i)>='0' && loc_x.charAt(i)<='9')
				||(loc_x.charAt(i)=='.'))) {
				alert("經度須為數字");
				document.addBoard.location_x.focus();
				return false;
			}
		}
	}
	
	if (document.addBoard.location_y.value == "") {
		alert("請輸入緯度");
		document.addBoard.location_y.focus();
		return false;
	}
	else {
		for (i=0; i<loc_y.length; i++) {
			if (!((loc_y.charAt(i)>='0' && loc_y.charAt(i)<='9')
				||(loc_y.charAt(i)=='.'))) {
				alert("緯度須為數字");
				document.addBoard.location_y.focus();
				return false;
			}
		}
	}
	
	if (document.addBoard.ip.value == "") {
		alert("請輸入IP");
		document.addBoard.ip.focus();
		return false;
	}
	else if (!isValidUrl(_ip)) {
		alert("請輸入正確的IP");
		document.addBoard.ip.focus();
		return false;
	}
	
	return confirm("確定資料無誤？");
}

function isValidUrl(str) {
	/*	'^(https?:\/\/)?' 								// protocol
		'((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|'	// domain name
		'((\d{1,3}\.){3}\d{1,3}))' +					// OR ip (v4) address
		'(\:\d+)?(\/[-a-z\d%_.~+]*)*' +					// port and path
		'(\?[;&a-z\d%_.~+=-]*)?' +						// query string
		'(\#[-a-z\d_]*)?$','i');						// fragment locater */
	var urlReg = /^(https?:\/\/)?((([a-zA-Z\d]([a-zA-Z\d-]*[a-zA-Z\d])*)\.)+[a-zA-Z]{2,}|((\d{1,3}\.){3}\d{1,3}))(\:\d+)?(\/[-a-zA-Z\d%_.~+]*)*(\?[;&a-zA-Z\d%_.~+=-]*)?(\#[-a-zA-Z\d_]*)?$/;
	return urlReg.test(str);
}

function confirmDelete() {
	return confirm("確定刪除主機？");
}