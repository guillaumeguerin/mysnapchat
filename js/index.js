
function checkSession()
{

var email = getCookie("email");
var password = getCookie("password");

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
	var reponseText = xmlhttp.responseText;
	//throw new Error("\""+reponseText+"\""+"avec logs email : "+email+" password : "+password);
		if(reponseText!="You have written a wrong email or a wrong password. ")
		{
		var trad = new Traductor(navigator.language);
		reponseText = trad.tradReponseText(reponseText);			
		document.getElementById("signbar").innerHTML=reponseText;		
		}
		else
		{		
		messages.style.display = 'none';
		friends.style.display = 'none';
		settings.style.display = 'none';
		logout.style.display = 'none';
		}
    }
  }  
  
xmlhttp.open("POST","php/logindb.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+email+"&p="+password);
}
