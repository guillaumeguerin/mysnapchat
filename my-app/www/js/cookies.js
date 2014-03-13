function setCookie(cname,cvalue,exdays)
{
window.localStorage.setItem(cname, cvalue);
}

function getCookie(cname)
{
var c = window.localStorage.getItem(cname);
if(c == null)
return "";
else
return c;
}

function flogout()
{
window.localStorage.removeItem("email");
window.localStorage.removeItem("password");
}
