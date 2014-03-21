function login() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    password = CryptoJS.MD5(password).toString();

    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;
            if (reponseText != " You have written a wrong email or a wrong password. ") {
                document.getElementById("txtHint").innerHTML = "";
                setCookie("email", email, 30);
                setCookie("password", password, 30);
                //document.getElementById("txtHint").innerHTML=getCookie("email")+" "+getCookie("password");
                redirectToHomePage ();
            } else {
                var trad = new Traductor(navigator.language);
                reponseText = trad.tradReponseText(reponseText);
                document.getElementById("txtHint").innerHTML = reponseText;
            }
        }
    }

    xmlhttp.open("POST", "php/logindb.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("e=" + email + "&p=" + password);
}
