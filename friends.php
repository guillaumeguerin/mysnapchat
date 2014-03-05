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
		if(reponseText==" true ")
		{
		your_email = email;
		showFriendList();
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


function showFriendList()
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
xmlhttp.open("POST","php/friends/getfriendlist.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+your_email);
}


function callphp(str)
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
		showFriendList();
    }
  }  
  
xmlhttp.open("POST","php/friends/addfriend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+your_email+"&fe="+friend_email);
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
									<h2 id=ptitle>Friends</h2>
								</header>
                              
							  
							  <p>
								 <form onsubmit="addFriend()" method="post" action="javascript:void(0);">
								 <div>
								 
								
								<div class="row half">
								<div class="6u">
								<input type="text" class="text" name="friend-email" id="friend-email" placeholder="Your friend's email" required/>
								</div>
								</div>
								
								</br>	
								<div class="row">
								<div class="12u">
								<input id="add-friend" type="submit" class="button" VALUE="Add" />
								</div>
								</div>
								
								</div>
								</form>
								<br>
							  						  
							  
							  </p>
							  
							  
							  <p>
								                              
                                                                       
									<div id="txtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b>Friends will be listed here. Please activate Javascript.</b></div>
							  
							  </p>
								<section class="is-gallery">

									
								</section>
							</article>
					</div>
		
								<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
<script>
work.style.height="40em";
main.style.overflow= "auto";
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('friends');
</script>
	</body>
</html>
