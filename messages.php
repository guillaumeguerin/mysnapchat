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
		<style>
.textInt {
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}
</style>
<script src="dist/FileAPI.js"></script>
		<script src="plugins/caman.full.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
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
		showMessageList();
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

function showMessageList()
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
xmlhttp.open("POST","php/messages/getmessagelist.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+your_email);
}

function showMessage(str)
{
if (str=="")
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
	var res = reponseText.split("<content>")[0];
	var trad = new Traductor(navigator.language);
	res = trad.tradReponseText(res);
	var content = reponseText.split("<content>")[1];
	reponseText = res+content;
	document.getElementById("txtHint").innerHTML=reponseText;
	loadEventUnload(str.split("?")[1]);
	setTimeout(function(){deleteMessage(str.split("?")[1])},60000);
    }
  }
xmlhttp.open("POST",str.split("?")[0],true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str.split("?")[1]);
}


function showMessagePicture(str)
{
if (str=="")
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
	var res = reponseText.split("<file>")[0];
	var trad = new Traductor(navigator.language);
	res = trad.tradReponseText(res);
	var file = reponseText.split("<file>")[1];
    document.getElementById("txtHint").innerHTML=res;
	FileAPI.Image(file)
			.resize(800, 600, 'max')
			.get(function (err, img){
				txtHint.appendChild(img);
				 })
	loadEventUnload(str.split("?")[1]);
	setTimeout(function(){deleteMessage(str.split("?")[1])},60000);
	}
  }
xmlhttp.open("POST",str.split("?")[0],true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str.split("?")[1]);
}



function deleteMessage(str)
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
	showMessageList();
	}
  }
xmlhttp.open("POST","php/messages/deletemessage.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str);
}


window.addEventListener("keyup",kPress,false);

function kPress(e)
{ 
var c=e.keyCode||e.charCode; 
if (c==44){
alert("print screen");
}
}

function loadEventUnload(str)
{ 
window.onbeforeunload = function (e) {
  var e = e || window.event;

  // For IE and Firefox
  if (e) {
    e.returnValue = 'Are you sure that you want to destroy the message ?';
  }

  // For Safari
  return 'Are you sure that you want to destroy the message ?';
};


window.onunload = function () {
  deleteMessage(str);
};
}
</script>

<style type="text/css" media="print">
 body {display:none;} 
</style>
  
	</head>
	<body class="homepage" onload="checkSession()" >

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
                                    <h2>Messages</h2>
								</header>
                                <p>
                                   <!-- NavMessage -->
                                    <center>
                                        <label id="newm">Create new message</label><br><br>
                                        <a id="navmt" href="submitMessage.php?type=text" class="fa fa-comment-o fa-2x" style="color:rgb(201, 195, 195);"></a>
                                        <a id="navmp" href="submitMessage.php?type=picture" class="fa fa-camera fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
                                        <a id="navmv" href="submitMessage.php?type=video" class="fa fa-film fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
                                        <a id="navmm" href="submitMessage.php?type=music" class="fa fa-music fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
                                    </center>
                                    
                                <!--    <table id="box-table-a">
                                    <tr>
                                        <td><a href="" class="fa fa-plus" style="color:rgb(90, 90, 90);"><span> &nbsp;&nbsp; New message</span></i></td>
                                    </tr>
                                </table>
                                -->
								</p>
								                   </br>              
                                      <p>                                 
									<div id="txtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b>Messages will be listed here. Please activate Javascript.</b></div>
                                    </p>
									
								<section class="is-gallery">

									
								</section>
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
pm.NavigatorActive('messages');
</script>
	</body>
</html>
