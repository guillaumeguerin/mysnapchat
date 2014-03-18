function checkSession() {

    var email = getCookie("email");
    var password = getCookie("password");
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;
            if (reponseText != " You have written a wrong email or a wrong password. ") {
				messages.style.display = '';
                friends.style.display = '';
                settings.style.display = '';
                logout.style.display = '';
                
            } else {
                
            }
        }
    }

    xmlhttp.open("POST", "php/logindb.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("e=" + email + "&p=" + password);
}
