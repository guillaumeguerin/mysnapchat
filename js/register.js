function checkEmail(email) {
    return (email.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/));
}

function checkPassword(password) {
    return !(password.length < 8 || password.length > 20 || password.search(/[a-z]/) < 0 || password.search(/[A-Z]/) < 0 || password.search(/[0-9]/) < 0);
}

function checkPasswordConfirm(password, passwordconfirm) {
    return (password == passwordconfirm);
}

function checkName(name) {
    return !(name.length < 2 || name.length > 50);
}

function checkDescription(description) {
    return (description.length < 50);
}

/*function checkData(email, password, passwordconfirm, name, description){
    return (checkEmail(email) && checkPassword(password) && checkPasswordConfirm(password, passwordconfirm) && checkName(name) && checkDescription(description));
}*/

function register() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordconfirm = document.getElementById("confirmpassword").value;
    var description = document.getElementById("description").value;
    var name = document.getElementById("name").value;

    var booleanEmail = checkEmail(email);
    var booleanPassword = checkPassword(password);
    var booleanPasswordConfirm = checkPasswordConfirm(password, passwordconfirm);
    var booleanName = checkName(name);
    var booleanDescription = checkDescription(description);

    if (booleanEmail && booleanPassword && booleanPasswordConfirm && booleanName && booleanDescription) {
        document.getElementById("txtHint").innerHTML = "";
        var xmlhttp = createXmlHttpRquestObject();

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var reponseText = xmlhttp.responseText;
                if (reponseText.replace(' ', '') == "True") {
                    password = CryptoJS.MD5(password).toString();
                    document.getElementById("txtHint").innerHTML = "";
                    setCookie("email", email, 30);
                    setCookie("password", password, 30);
                    redirectToHomePage ();
                } else {
                    var trad = new Traductor(navigator.language);
                    reponseText = trad.tradReponseText(reponseText);
                    document.getElementById("txtHint").innerHTML = reponseText;
                }
            }
        }

        xmlhttp.open("POST", "php/registerdb.php", true);
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
