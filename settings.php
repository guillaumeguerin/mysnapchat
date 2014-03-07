<!DOCTYPE HTML>
<!--
	Astral 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	
        <?php
        include("pagehaut.php");
        ?>
		
		
		
<script type="text/javascript" src="js/cookies.js"></script>		
<script>
var your_email;
var your_password;
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
		if(reponseText!=" You have written a wrong email or a wrong password. ")
		{
		your_email = email;
		your_password=password;
		showSettings();
		}
		else
		{
		window.location.href = "index.php"
		}
    }
  }  
  
xmlhttp.open("POST","php/logindb.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+email+"&p="+password);
}


function showSettings()
{

if (your_email=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
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
	var trad = new Traductor(navigator.language);
	reponseText = trad.tradReponseText(reponseText);	
    document.getElementById("txtHint").innerHTML=reponseText;
    }
  }
xmlhttp.open("POST","php/settings/getsettings.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password);
}



function modifySettings(obj)
{
var	newEmail = obj.email.value;
var	newPassword = obj.password.value;
var newName = obj.name.value;
var newDescription = obj.description.value;


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
		if(newEmail!=""||newPassword!="")
		{
		setCookie("email","",-30);
		setCookie("password","",-30);
		window.location.href = "index.php"		
		}
		else
		{
		showSettings();
		}
    }
  }  
  
xmlhttp.open("POST","php/settings/updatesettings.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password+"&ne="+newEmail+"&np="+newPassword+"&nn="+newName+"&nd="+newDescription);

}

function deleteAccount(obj)
{
if(obj.confirmation.value=="Yes"||obj.confirmation.value=="Oui")
{
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
	setCookie("email","",-30);
	setCookie("password","",-30);
	window.location.href = "index.php"		
    }
  }
xmlhttp.open("POST","php/settings/deleteaccount.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password);
}
}

</script>		
	</head>
	<body class="homepage" onload="checkSession()">

		<!-- Wrapper-->
			<div id="wrapper">
				
					<!-- Nav -->
                <?php
                include("navigator.php");				
                ?>


				<!-- Main -->
					<div id="main">
							<article id="work" class="panel">
								<header>
									<h2 id="ptitle">Settings</h2>
								</header>
								<p>
								                              
                                                                       
									<div id="txtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b>Settings will be listed here. Please activate Javascript.</b></div>
							  
							  </p>
							  
                                <p>
								<form onsubmit="deleteAccount(this)" method="post" action="javascript:void(0);">
								 <div>
								<p>
								<h2 id="dtitle">Delete Account</h2>
                                </p>
								<div class="row">
								<div class="12u">
								<input type="text" class="text" name="confirmation" id="confirmation" placeholder="Are you sure ? Type 'Yes' if you want to delete your account and click on the button." required/>
								</div>
								</div>
								
								</br>	
								<div class="row">
								<div class="12u">
								<input id="deletea" type="submit" class="button" VALUE="Delete Account" />
								</div>
								</div>
								
								</div>
								</form>
								  </p>
								
							</article>
					</div>
		
				<!-- Footer -->
									<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
<script>
work.style.height="40em";
main.style.overflow= "auto";
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('settings');
</script>

	</body>
</html>
