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
		your_password=password;
		showSettings();
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


function showSettings()
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
xmlhttp.open("POST","php/settings/getsettings.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password);
}



function modifySettings(obj)
{
var	newEmail = obj.email.value;
var	newPassword = obj.password.value;
var newPasswordConfirm = obj.passwordconfirmation.value;
var newName = obj.name.value;
var newDescription = obj.description.value;



var booleanPassword = true;
var booleanName = true;
var booleanEmail = true;
var booleanDescription = true;
var booleanPasswordConfirm = true;

if (newEmail!="")
{
if (!newEmail.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)) { 
booleanEmail = false;
}
}

if (newPassword!="")
{
if (newPassword.length < 8) {
booleanPassword = false;
}
if (newPassword.length > 20) {
booleanPassword = false;
}
if (newPassword.search(/[a-z]/) < 0) { 
booleanPassword = false;
}
 if (newPassword.search(/[A-Z]/) < 0) { 
booleanPassword = false;
}
if (newPassword.search(/[0-9]/) < 0) {
booleanPassword = false;
}
if (newPassword!=newPasswordConfirm) {
booleanPasswordConfirm = false;
}
newPassword = CryptoJS.MD5(newPassword).toString();
}


if (newName!="")
{
if (newName.length < 2) {
booleanName = false;
}
if (newName.length > 50) {
booleanName = false;
}
}

if (newDescription.length > 50) {
booleanDescription = false;
}


if(booleanEmail && booleanPassword && booleanPasswordConfirm && booleanName && booleanDescription)
{
var xmlhttp=createXmlHttpRquestObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
	var reponseText = xmlhttp.responseText;
		if(newEmail!=""||newPassword!="")
		{
		flogout();
		window.location.href = "index.html"		
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

else
{
if(navigator.language.indexOf("fr") >= 0)
{
if(!booleanEmail)
document.getElementById("settingsTxtHint").innerHTML="Votre adresse email n'est pas valide.";
if(!booleanName)
document.getElementById("settingsTxtHint").innerHTML="Votre nom doit faire entre 2 et 50 caractères";
if(!booleanDescription)
document.getElementById("settingsTxtHint").innerHTML="Votre description doit faire moins de 50 caractères";
if(!booleanPassword)
document.getElementById("settingsTxtHint").innerHTML="Votre mot de passe doit faire entre 8 et 50 caractères avec au moins un chiffre, un caractère majuscule et minuscule";
if(!booleanPasswordConfirm)
document.getElementById("settingsTxtHint").innerHTML="Votre mot de passe et le mot de passe de confirmation  sont différents.";
}
else
{
if(!booleanEmail)
document.getElementById("settingsTxtHint").innerHTML="Your email is not valid.";
if(!booleanName)
document.getElementById("settingsTxtHint").innerHTML="Your name must be at least 2 characters and less than 50 characters";
if(!booleanDescription)
document.getElementById("settingsTxtHint").innerHTML="Your description must be less than 50 characters";
if(!booleanPassword)
document.getElementById("settingsTxtHint").innerHTML="Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
if(!booleanPasswordConfirm)
document.getElementById("settingsTxtHint").innerHTML="Your password and your password confirmation are different.";
}
}
}

function deleteAccount(obj)
{
if(obj.confirmation.value=="Yes"||obj.confirmation.value=="Oui")
{
var xmlhttp=createXmlHttpRquestObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
	setCookie("email","",-30);
	setCookie("password","",-30);
	window.location.href = "index.html"		
    }
  }
xmlhttp.open("POST","php/settings/deleteaccount.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+your_email+"&password="+your_password);
}
}

