var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('homespan').innerHTML="Accueil";
document.getElementById('friendsspan').innerHTML="Amis";
document.getElementById('settingsspan').innerHTML="Paramètres";
document.getElementById('logoutspan').innerHTML="Déconnection";
}
}