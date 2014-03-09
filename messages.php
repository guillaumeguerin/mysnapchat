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
 
    .progressbar_container {
        border: 1px solid #000;
    }
    .progressbar {
        width: 0%;
        background: #DEDEDE;
        height: 20px;  
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
var your_password;
var booleanscreen;
function checkSession()
{

var email = getCookie("email");
var password = getCookie("password");
var readedMessage = getCookie("readedmessage");


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
			your_password = password;
			if (readedMessage!="")
				{
				deleteMessage(readedMessage,true);
				}
			else
				{
				showMessageList();
				}
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
xmlhttp.send("email="+your_email+"&password="+your_password);
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
	setCookie("readedmessage",str.split("?q=")[1],30);
	loadEventBeforeUnload(str.split("?")[1]);
	booleanscreen=true;
	loadEventPrintScreen(str.split("?q=")[1]);
	setTimeout(function(){deleteMessage(str.split("?q=")[1],true)},60000);
    }
  }
xmlhttp.open("POST",str.split("?")[0],true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str.split("?")[1]+"&email="+your_email+"&password="+your_password);
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
				 });
	setCookie("readedmessage",str.split("?q=")[1],30);
	loadEventBeforeUnload(str.split("?")[1]);
	booleanscreen=true;
	loadEventPrintScreen(str.split("?q=")[1]);
	setTimeout(function(){deleteMessage(str.split("?q=")[1],true)},60000);
	}
  }
xmlhttp.open("POST",str.split("?")[0],true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str.split("?")[1]+"&email="+your_email+"&password="+your_password);
}



function deleteMessage(str,showlist)
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
	setCookie("readedmessage","",-30);
	unloadEventBeforeUnload();
	if(showlist)
		showMessageList();
	}
  }
xmlhttp.open("POST","php/messages/deletemessage.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&e="+your_email);
}



function showMessageSender(str)
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
	var trad = new Traductor(navigator.language);
	reponseText = trad.tradReponseText(reponseText);
	document.getElementById("txtHint").innerHTML=reponseText;
	if(str=="picture")
		pm.NavigatorActive('messagePicture');
	else
		if(str=="video")
			pm.NavigatorActive('messageVideo');
	else
		if(str=="text")
			pm.NavigatorActive('messageText');
	else
		if(str=="music")
			pm.NavigatorActive('messageMusic');
			
	readedMessage=getCookie("readedmessage");
	if(readedMessage!="")
		deleteMessage(readedMessage,false);
    }
  }
xmlhttp.open("POST","php/messages/messagesender.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("type="+str+"&email="+your_email+"&password="+your_password);
}



function loadEventBeforeUnload(str)
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
  deleteMessage(str,true);
};
}


function unloadEventBeforeUnload()
{ 
window.onbeforeunload = function () {};
window.onunload = function () {};
}


function loadEventPrintScreen(str)
{ 

function kPress(e)
{ 
var c=e.keyCode||e.charCode; 
if (c==44){
if(booleanscreen)
{
sendScreenshotAlert(str);
booleanscreen=false;
}
alert("Screenshot Detected");
}
}

window.addEventListener("keyup",kPress,false);
}

function sendScreenshotAlert(str)
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
	
	}
  }
xmlhttp.open("POST","php/messages/sendscreenshotalert.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&e="+your_email);
}

function sendMessage(obj,type)
{
var booleansize = true;
var booleantype = false;
var	receiver = obj.receiver.value;

var data = new FormData();

if(type == "text"){
var	content = obj.content.value;
booleantype=true;
data.append('content', content);
}
else
{
var	content = obj.content.files[0];
var typem;


if(type == "music")
	typem = "audio";
if(type == "video")
	typem = "video";
if(type == "picture")
	typem = "image";
if(typeof content != 'undefined'){
if(content.type.indexOf(typem) == 0){
	booleantype=true;
	if(content.size>10485760)
		booleansize = false;
	else
	data.append('file', content);
}
}


}

if(booleantype){
if(booleansize)
{
data.append('receiver', receiver);
data.append('type', type);
data.append('email', your_email);
data.append('password', your_password);


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
  
  xmlhttp.upload.addEventListener('progress', function(e){   
    progressbar.style.width = e.loaded/e.total * 100 + '%';	
}, false);
  
xmlhttp.open("POST","php/messages/sendmessage.php",true);
xmlhttp.send(data);
}
else
{
if(navigator.language != null){
			if(navigator.language.indexOf("fr") >= 0)
			document.getElementById("messageSendertxtHint").innerHTML="Votre fichier est trop gros, il doit faire moins de 10 MO.";
}
else
document.getElementById("messageSendertxtHint").innerHTML="Your file is too big it should be less than 10 MB.";
}
}
else
{
if(navigator.language != null){
			if(navigator.language.indexOf("fr") >= 0)
			{
			var typeReponse;
			if(type == "music")
				typeReponse = "musique";
			if(type == "video")
				typeReponse = "vidéo";
			if(type == "picture")
				typeReponse = "image";
			document.getElementById("messageSendertxtHint").innerHTML="Votre fichier n'est pas une "+typeReponse+".";
			}
}
else
document.getElementById("messageSendertxtHint").innerHTML="Your file isn't a "+type+".";
}
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
                                        <a id="navmt" href="javascript:void(0)" onclick="showMessageSender('text')" class="fa fa-comment-o fa-2x" style="color:rgb(201, 195, 195);"></a>
                                        <a id="navmp" href="javascript:void(0)" onclick="showMessageSender('picture')" class="fa fa-camera fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
                                        <a id="navmv" href="javascript:void(0)" onclick="showMessageSender('video')" class="fa fa-film fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
                                        <a id="navmm" href="javascript:void(0)" onclick="showMessageSender('music')" class="fa fa-music fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>
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
work.style.height="50em";
main.style.overflow= "auto";
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('messages');
</script>
	</body>
</html>
