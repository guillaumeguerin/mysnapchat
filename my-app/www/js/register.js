function register() {
    var booleanPassword = true;
    var booleanPasswordConfirm = true;
    var booleanName = true;
    var booleanEmail = true;
    var booleanDescription = true;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordconfirm = document.getElementById("confirmpassword").value;
    var description = document.getElementById("description").value;
    var name = document.getElementById("name").value;

    if (!email.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)) {
        booleanEmail = false;
    }
    if (password.length < 8) {
        booleanPassword = false;
    }
    if (password.length > 20) {
        booleanPassword = false;
    }
    if (password.search(/[a-z]/) < 0) {
        booleanPassword = false;
    }
    if (password.search(/[A-Z]/) < 0) {
        booleanPassword = false;
    }
    if (password.search(/[0-9]/) < 0) {
        booleanPassword = false;
    }
    if (password != passwordconfirm) {
        booleanPasswordConfirm = false;
    }
    if (name.length < 2) {
        booleanName = false;
    }
    if (name.length > 50) {
        booleanName = false;
    }
    if (description.length > 50) {
        booleanDescription = false;
    }

    if (booleanEmail && booleanPassword && booleanPasswordConfirm && booleanName && booleanDescription) {
        document.getElementById("txtHint").innerHTML = "";
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var reponseText = xmlhttp.responseText;
                if (reponseText.replace(' ', '') == "True") {
                    password = CryptoJS.MD5(password).toString();
                    document.getElementById("txtHint").innerHTML = "";
                    setCookie("email", email, 30);
                    setCookie("password", password, 30);
                    window.location.href = "index.html";
                } else {
                    var trad = new Traductor(navigator.language);
                    reponseText = trad.tradReponseText(reponseText);
                    document.getElementById("txtHint").innerHTML = reponseText;
                }
            }
        }

        xmlhttp.open("POST", "http://gguerind.0fees.net/mysnapchat/php/registerdb.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("email=" + email + "&password=" + password + "&description=" + description + "&name=" + name);
    } else {
        if (navigator.language.indexOf("fr") >= 0) {
            if (!booleanEmail)
                document.getElementById("txtHint").innerHTML = "Votre adresse email n'est pas valide.";
            if (!booleanName)
                document.getElementById("txtHint").innerHTML = "Votre nom doit faire entre 2 et 50 caractères";
            if (!booleanDescription)
                document.getElementById("txtHint").innerHTML = "Votre description doit faire moins de 50 caractères";
            if (!booleanPassword)
                document.getElementById("txtHint").innerHTML = "Votre mot de passe doit faire entre 8 et 50 caractères avec au moins un chiffre, un caractère majuscule et minuscule";
            if (!booleanPasswordConfirm)
                document.getElementById("txtHint").innerHTML = "Votre mot de passe et le mot de passe de confirmation  sont différents.";
        } else {
            if (!booleanEmail)
                document.getElementById("txtHint").innerHTML = "Your email is not valid.";
            if (!booleanName)
                document.getElementById("txtHint").innerHTML = "Your name must be at least 2 characters and less than 50 characters";
            if (!booleanDescription)
                document.getElementById("txtHint").innerHTML = "Your description must be less than 50 characters";
            if (!booleanPassword)
                document.getElementById("txtHint").innerHTML = "Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
            if (!booleanPasswordConfirm)
                document.getElementById("txtHint").innerHTML = "Your password and your password confirmation are different.";
        }
    }
}
