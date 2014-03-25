<html>
<head>
<title>Pittsburgh Interactive Research Accounting System</title>
<script src=http://code.jquery.com/jquery-1.4.2.min.js></script>
<script type="text/javascript">
function initialize(){
	//call the get checkbox methods
	getAccountCheckboxes();
	getSubcodesCheckboxes();
	getTable();
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
xmlhttp.open("GET","gettransactions.php?mode=normal",true);
xmlhttp.send();
}

function getAccountCheckboxes() {
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
    			document.getElementById("accountcheckboxes").innerHTML= xmlhttp.responseText; 
    		}
  	}
	xmlhttp.open("GET","getaccounts.php",true);
	xmlhttp.send();
}

function getSubcodesCheckboxes() {
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
    			document.getElementById("subcodescheckboxes").innerHTML= xmlhttp.responseText; 
    		}
  	}
	xmlhttp.open("GET","getsubcodes.php?mode=check",true);
	xmlhttp.send();
}

function reset(){
//empty all of the text boxes
document.getElementById("accountMin").value="Account Min";
document.getElementById("accountMax").value="Account Max";
document.getElementById("keyword").value="Keyword";
//reset all checkboxes to checked
var inputs = document.getElementsByTagName("input");
for (var i = 0; i < inputs.length; i++) {  
  if (inputs[i].type == "checkbox") {  
    if (!inputs[i].checked) {  
		inputs[i].checked=true;
    }  
  }  
} 
//reinitialize the table
getTable();
}

function filter(){
//read values from textboxes and checkboxes
//call PHP file that will filter by the requested stuff
var theString = "WHERE";

var accountMinimum = document.getElementById("accountMin").value;
if(accountMinimum != "Account Min"){
	theString += " amount > "+accountMinimum;
}
var accountMaximum = document.getElementById("accountMax").value;
if(accountMaximum != "Account Max"){
	if(accountMinimum != "Account Min")
	{
		theString += " AND";
	}
	theString += " amount < "+accountMaximum;
}

//check the check boxes


var inputs = document.getElementsByTagName("input");
var areThereUnchecked = false;
if(accountMinimum != "Account Min" || accountMaximum != "Account Max"){
for (var i = 0; i < inputs.length; i++) {  
  if (inputs[i].type == "checkbox") {  
    if (!inputs[i].checked) {  
		areThereUnchecked=true;
    }  
  }
}
	if(areThereUnchecked == true){
	theString += " AND ";
	}
}

var firstFound = true;
for (var i = 0; i < inputs.length; i++) {  
  if (inputs[i].type == "checkbox") {  
    if (!inputs[i].checked) {  
		var type = "subcode";
		if(inputs[i].id.charAt(2) == "-"){
			type = "account";
		}
		if(firstFound == true)
		{
			theString += " "+type+" != '"+inputs[i].id+"'";
			firstFound = false;
		}
		else
		{
			theString += " AND "+type+" != '"+inputs[i].id+"'";
		}
    }  
  }
}
if(firstFound == true && accountMinimum == "Account Min" && accountMaximum == "Account Max"){
	var keyword = document.getElementById("keyword").value;
	if(keyword != "Keyword"){
		theString += " description like '%"+keyword+"%'";
	}
}
else{
	var keyword = document.getElementById("keyword").value;
	if(keyword != "Keyword"){
		theString += " AND description like '%"+keyword+"%'";
	}
}

 console.log(theString);
 
if(theString != "WHERE")
{
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
	xmlhttp.open("GET","gettransactions.php?mode=filter&q="+theString,true);
	xmlhttp.send();
}
}
</script>
</head>
<body onload="initialize()">

<h1>Steven Bauer - SMB158</h1><hr><br/><br/>
<input type="text" id="keyword" value="Keyword">
<div id="accountcheckboxes"></div>
<div id="subcodescheckboxes"></div>
<input type="text" id="accountMin" value="Account Min">
<input type="text" id="accountMax" value="Account Max">
<button type="button" onclick="reset()">Reset</button>
<button type="button" onclick="filter()">Filter</button><br/><br/>
<div id="theTransactions"></div>

</body>
</html>