var your_email;
var your_password;

function createXmlHttpRquestObject(){
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
return xmlhttp;
}

function checkSession()
{

var email = getCookie("email");
var password = getCookie("password");
var xmlhttp=createXmlHttpRquestObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
	var reponseText = xmlhttp.responseText;
		if(reponseText!=" You have written a wrong email or a wrong password. ")
		{
		your_email = email;
		your_password = password;
		showFriendList();
		}
		else
		{
		window.location.href = "index.html"
		}
    }
  }  
  
xmlhttp.open("POST","php/logindb.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+email+"&p="+password);
}


function showFriendList()
{

if (your_email=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=createXmlHttpRquestObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
	var reponseText = xmlhttp.responseText;
	var trad = new Traductor(navigator.language);
	reponseText = trad.tradReponseText(reponseText);	
    document.getElementById("txtHint").innerHTML=reponseText;
    }
  }
xmlhttp.open("POST","php/friends/getfriendlist.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password);
}


function callphp(str)
{
var xmlhttp=createXmlHttpRquestObject();

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
		showFriendList();
    }
  }  
  
xmlhttp.open("POST",str.split("?")[0],true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str.split("?")[1]);
}


function addFriend()
{
var friend_email = document.getElementById("friend-email").value;
var xmlhttp=createXmlHttpRquestObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
		showFriendList();
    }
  }  
  
xmlhttp.open("POST","php/friends/addfriend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+your_email+"&fe="+friend_email);
}


