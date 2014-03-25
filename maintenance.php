<html>
<head>
<title>Pittsburgh Interactive Research Accounting System</title>
<script src=http://code.jquery.com/jquery-1.4.2.min.js></script>
<script type="text/javascript">
function initialize(){
	getSubcodeDropdown()
	getTable();
}

function getSubcodeDropdown(){
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("subcode").innerHTML=xmlhttp.responseText; 
    }
  }
xmlhttp.open("GET","getsubcodes.php?mode=drop&current=",true);
xmlhttp.send();
}

function getTable(){
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("theTransactions").innerHTML=xmlhttp.responseText; 
    }
  }
xmlhttp.open("GET","gettransactions.php?mode=main",true);
xmlhttp.send();
}
function enableAddTrans(){
	document.getElementById("addTrans").style.visibility="visible";
}
function disableAddTrans(){
	document.getElementById("addTrans").style.visibility="hidden";
}

function saveTuple(txid){

	var theRow = document.getElementById(txid);
	var tds = theRow.getElementsByTagName("td");
	
	var date = tds[2].getElementsByTagName("input")[0].value;
	
	var tempdatesplit = date.split("/");
	
	date = tempdatesplit[2]+"-"+tempdatesplit[1]+"-"+tempdatesplit[0];
	
	var account = tds[3].getElementsByTagName("input")[0].value;
	var description = tds[6].getElementsByTagName("input")[0].value;
	var amount = tds[5].getElementsByTagName("input")[0].value;
	var subcodeBox = tds[4].getElementsByTagName("select")[0];
	var subcode = subcodeBox.options[subcodeBox.selectedIndex].value;

	
		var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
	} else {
		// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var d=new Date();	//get current date+time
	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    			getTable();
    		}
  	}

	//gather vars
	xmlhttp.open("GET","tupleManip.php?mode=update&date="+date+"&account="+account+"&subcode="+subcode+"&amount="+amount+"&description="+description+"&txid="+txid,true);
	
	console.log("*"+"tupleManip.php?mode=update&date="+date+"&account="+account+"&subcode="+subcode+"&amount="+amount+"&description="+description+"&txid="+txid+"*");
	xmlhttp.send();
}
function updateTuple(txid){
	var theRow = document.getElementById(txid);
	var tds = theRow.getElementsByTagName("td");
	tds[0].innerHTML="<button type=\"button\" onclick=\"saveTuple("+txid+")\">Save</button><button type=\"button\" onclick=\"getTable()\">Cancel</button>";
	
	var tempdate = tds[2].innerHTML;
	var tempdatesplit = tempdate.split("-");
	var outputdate = tempdatesplit[1]+"/"+tempdatesplit[2]+"/"+tempdatesplit[0];

	
	tds[2].innerHTML = "<input type=\"text\" id=\"txdate\" value=\""+outputdate+"\">";
	tds[3].innerHTML = "<input type=\"text\" id=\"account\" value=\""+tds[3].innerHTML+"\">";
	
	//get the subcode dropdown box
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
	} else {
		// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var d=new Date();	//get current date+time
	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    			tds[4].innerHTML = xmlhttp.responseText;
    		}
  	}
	xmlhttp.open("GET","getsubcodes.php?mode=drop&current="+tds[4].innerHTML,true);
	xmlhttp.send();

	tds[5].innerHTML = "<input type=\"text\" id=\"amount\" value=\""+tds[5].innerHTML+"\">";
	tds[6].innerHTML = "<input type=\"text\" id=\"description\" value=\""+tds[6].innerHTML+"\">";
}
function deleteTuple(txid){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
	} else {
		// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var d=new Date();	//get current date+time
	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    			getTable();
    		}
  	}
	xmlhttp.open("GET","tupleManip.php?mode=delete&txid="+txid,true);
	xmlhttp.send();
}
function addTransaction(){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
	} else {
		// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var d=new Date();	//get current date+time
	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    			getTable();
    		}
  	}

	//gather vars
	var date = document.getElementById("txdate").value;
	var datepieces = date.split("/");
	date = datepieces[2]+"-"+datepieces[0]+"-"+datepieces[1];
	var account = document.getElementById("account").value;
	
	var subcodeBox = document.getElementById("dropbox");
	var subcode = subcodeBox.options[subcodeBox.selectedIndex].value;
	
	var amount = document.getElementById("amount").value;
	var desc = document.getElementById("description").value;
	
	xmlhttp.open("GET","tupleManip.php?mode=add&date="+date+"&account="+account+"&subcode="+subcode+"&amount="+amount+"&description="+desc,true);
	xmlhttp.send();
}
</script>
</head>
<body onload="initialize()">

<h1>Steven Bauer - SMB158</h1><hr><br/><br/>

<button type="button" onclick="enableAddTrans()">Add transaction</button>

<div id="addTrans" style="visibility:hidden">
<input type="text" id="txdate" value="mm/dd/yyyy">
<input type="text" id="account" value="Account">
<span id="subcode"></span>
<input type="text" id="amount" value="Amount">
<input type="text" id="description" value="Description">
<button type="button" onclick="disableAddTrans()">Cancel</button>
<button type="button" onclick="addTransaction()">Save</button>
</div>


<br/><br/>
<div id="theTransactions"></div>

</body>
</html>