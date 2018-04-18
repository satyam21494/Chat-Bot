<?php
?>

<html>
<head>
<title>Chat Box</title>
<link rel="stylesheet" type="text/css" href="chat.css"/>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>

function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
    form1.uname.readOnly = true;
    form1.uname.style.border = 'none';
    
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>
<body>
<form name="form1" style="float:right">
Client Name: <input type="text" name="uname" style="width:200px;"/> <br />
Message: <br />
<textarea name="msg" style="width:250px;height:350px"></textarea><br />
<a href="#" onclick="submitChat()" class="button">Send</a><br /><br />
</form>
<div id="chatlogs">
LOADING CHATLOG...
</div>

</body>
</html>