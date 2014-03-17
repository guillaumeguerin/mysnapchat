﻿var Traductor = function (language) {

    this.tradNavBar = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('homespan').innerHTML = "Accueil";
                document.getElementById('friendsspan').innerHTML = "Amis";
                document.getElementById('settingsspan').innerHTML = "Paramètres";
                document.getElementById('logoutspan').innerHTML = "Déconnection";
            }
        }
    }


    this.tradIndex = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('signin').innerHTML = "Se connecter";
                document.getElementById('signup').innerHTML = "S'enregistrer";
                document.getElementById('description').innerHTML = "Snap Chat Bordeaux est une application disponible en tant que site web mais également pour smartphones.";
            }
        }
    }

    this.tradFooter = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('createb').innerHTML = "Créé par";
                document.getElementById('projetf').innerHTML = "Projet pour l'Université de Bordeaux";

            }
        }
    }


    this.tradRegister = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('titlep').innerHTML = "Inscription";
                document.getElementById('signup').value = "S'inscrire";
                document.getElementById('name').placeholder = "Nom";
                document.getElementById('email').placeholder = "Adresse email";
                document.getElementById('password').placeholder = "Mot de passe";
                document.getElementById('confirmpassword').placeholder = "Confirmation du mot de passe";
                document.getElementById('homespan').innerHTML = "Accueil";
            }
        }
    }

    this.tradLogin = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('ptitle').innerHTML = "Connection";
                document.getElementById('signin').value = "Se connecter";
                document.getElementById('email').placeholder = "Adresse email";
                document.getElementById('password').placeholder = "Mot de passe";
            }
        }
    }


    this.tradMessages = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('newm').innerHTML = "Envoyer un nouveau message";
            }
        }
    }



    this.tradFriends = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('ptitle').innerHTML = "Amis";
                document.getElementById('friend-email').placeholder = "Adresse email de votre ami";
                document.getElementById('add-friend').value = "Ajouter";
            }
        }
    }


    this.tradSettings = function () {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                document.getElementById('ptitle').innerHTML = "Paramètres";
                document.getElementById('dtitle').innerHTML = "Suppression du compte";
                document.getElementById('deletea').value = "Supprimer le compte";
                document.getElementById('confirmation').placeholder = "Êtes-vous sûr ? Écrivez 'Oui' si vous voulez supprimer votre compte et cliquez sur le bouton.";
            }
        }
    }

    this.tradReponseText = function (text) {
        if (language != null) {
            if (language.indexOf("fr") >= 0) {
                var find, re;
                text = text.replace("Unread messages</label>", "Messages non lus</label>");
                text = text.replace("Unread message</label>", "Message non lu</label>");
                text = text.replace("You have no unread message</label>", "Vous n'avez aucun message non lu</label>");
				text = text.replace("<br>The following message will be destroyed in","<br>Le message suivant s'auto-détruira dans");
				text = text.replace("seconds.<br>","secondes.<br>");
                text = text.replace("<h3>Message from", "<h3>Message de");
				text = text.replace("Message already watched !", "Message déjà vu !");
                text = text.replace("Welcome to our website ", "Bienvenue sur notre site ");
                text = text.replace("<h3>You have no friend request", "<h3>Vous n'avez aucune demande d'ami");
                text = text.replace("<h3>You have no friend", "<h3>Vous n'avez pas encore d'ami");
                text = text.replace(" friend request</h3>", " demande d'ami</h3>");
                text = text.replace(" friend requests</h3>", " demandes d'amis</h3>");
                text = text.replace(" friend</h3>", " ami</h3>");
                text = text.replace(" friends</h3>", " amis</h3>");
                text = text.replace("VALUE=\"Apply new settings\"", "VALUE=\"Appliquer les nouveaux paramètres\"");
                text = text.replace("Your email :", "Votre adresse email :");
                text = text.replace("Your password :", "Votre mot de passe :");
                text = text.replace("Password confirmation :", "Confirmation du mot de passe :");
                text = text.replace("Your name :", "Votre nom :");
                text = text.replace("Your description :", "Votre description :");
                text = text.replace('placeholder="Your message"', 'placeholder="Votre message"');
                text = text.replace('<h3>Receiver :</h3>', '<h3>Destinataire :</h3>');
                text = text.replace('<h3>Your message :</h3>', '<h3>Votre message :</h3>');
                text = text.replace('<h3>Your picture :</h3>', '<h3>Votre image :</h3>');
                text = text.replace('<h3>Your video :</h3>', '<h3>Votre vidéo :</h3>');
                text = text.replace('<h3>Your music :</h3>', '<h3>Votre musique :</h3>');
                text = text.replace("<h3>Upload progression :</h3>", "<h3>Progression de l'envoi :</h3>");
                text = text.replace('value="Send"', 'value="Envoyer"');
                text = text.replace("<h3>You need to have at least a friend to send messages.</h3>", "<h3>Vous devez avoir au moins un ami pour envoyer des messages.</h3>");
                text = text.replace("You have written a wrong email or a wrong password", "Vous avez écrit une mauvaise adresse email ou un mauvais mot de passe");
                text = text.replace("I took a screenshot from the message you sent me", "J'ai pris un screenshot du message que vous m'avez envoyé il y a");
                text = text.replace("Please don't spam the admin account !", "Nous vous prions de bien vouloir ne pas spammer le compte admin !");

                text = text.replace("Your email is not valid.", "Votre adresse email n'est pas valide.");
                text = text.replace("Your name must be at least 2 characters and less than 50 characters", "Votre nom doit faire entre 2 et 50 caractères");
                text = text.replace("Your description must be less than 50 characters", "Votre description doit faire moins de 50 caractères");
                text = text.replace("Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.", "Votre mot de passe doit faire entre 8 et 50 caractères avec au moins un chiffre, un caractère majuscule et minuscule");
                text = text.replace("Welcome to Snap chat Bordeaux !", "Bienvenue sur Snap chat Bordeaux");


                find = " days ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " jours</td>");

                find = " day ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " jour</td>");

                find = " hours ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " heures</td>");

                find = " hour ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " heure</td>");

                find = " minutes ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " minutes</td>");

                find = " minute ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " minute</td>");

                find = " seconds ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " secondes</td>");

                find = " second ago</td>";
                re = new RegExp(find, 'g');
                text = text.replace(re, " seconde</td>");

                find = "<span id=\"view\"> View</span>";
                re = new RegExp(find, 'g');
                text = text.replace(re, "<span id=\"view\"> Regarder</span>");

                find = "<span id=\"accept\"> Accept</span>";
                re = new RegExp(find, 'g');
                text = text.replace(re, "<span id=\"accept\"> Accepter</span>");

                find = "<span id=\"refuse\"> Refuse</span>";
                re = new RegExp(find, 'g');
                text = text.replace(re, "<span id=\"refuse\"> Refuser</span>");

                find = "<span id=\"delete\"> Delete</span>";
                re = new RegExp(find, 'g');
                text = text.replace(re, "<span id=\"delete\"> Supprimer</span>");

                find = "<h3>You have ";
                re = new RegExp(find, 'g');
                text = text.replace(re, "<h3>Vous avez ");

            }
        }
        return text;

    }


}


var PageModificator = function (userAgent, language) {

    var traductor = new Traductor(language);


    this.UserAgentIndex = function () {

        var txt;
        if (userAgent != null) {
            if (language != null) {
                if (language.indexOf("fr") >= 0) {
                    txt = "Vous utilisez un navigateur sous ";
                } else {
                    txt = "You are using a brower on ";
                }
            }

            if (userAgent.indexOf("Android") > 0) {
                /*gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';*/
                apple.style.display = 'none';
                windows.style.display = 'none';
                laptop.style.display = 'none';
                txt += "Android";
            } else if (userAgent.indexOf("Windows Phone") > 0) {
                /*gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';*/
                apple.style.display = 'none';
                android.style.display = 'none';
                laptop.style.display = 'none';
                txt += "Windows Phone";
            } else if (userAgent.indexOf("iPhone OS") > 0) {
                /*gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';*/
                android.style.display = 'none';
                windows.style.display = 'none';
                laptop.style.display = 'none';
                txt += "iOS";
            } else {
                txt += navigator.platform;
            }
            if (language != null) {
                if (language.indexOf("fr") >= 0) {
                    txt += " en français. Vous pouvez télécharger notre application en cliquant ci-dessous.";
                } else if (language.indexOf("en") >= 0) {
                    txt += " in english. You can download our application by clicking below.";
                } else {
                    txt += ".";
                }
            }

            document.getElementById("testUA").innerHTML = txt;
        }

    }

    this.NavigatorActive = function (pageName) {

        if (pageName == 'home') {
            document.getElementById('home').className = "fa fa-home active";
            traductor.tradIndex();
        }

        if (pageName == 'messages') {
            document.getElementById('messages').className = "fa fa-envelope active";
            traductor.tradMessages();
        }


        if (pageName == 'messageVideo') {
            document.getElementById('navmv').style.color = "rgb(0, 0, 0)";
            document.getElementById('navmp').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmt').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmm').style.color = "rgb(201, 195, 195)";
        }

        if (pageName == 'messageText') {
            document.getElementById('navmt').style.color = "rgb(0, 0, 0)";
            document.getElementById('navmp').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmv').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmm').style.color = "rgb(201, 195, 195)";
        }

        if (pageName == 'messageMusic') {
            document.getElementById('navmm').style.color = "rgb(0, 0, 0)";
            document.getElementById('navmp').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmt').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmv').style.color = "rgb(201, 195, 195)";
        }

        if (pageName == 'messagePicture') {
            document.getElementById('navmp').style.color = "rgb(0, 0, 0)";
            document.getElementById('navmv').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmt').style.color = "rgb(201, 195, 195)";
            document.getElementById('navmm').style.color = "rgb(201, 195, 195)";
        }

        if (pageName == 'friends') {
            document.getElementById('friends').className = "fa fa-user active";
            traductor.tradFriends();
        }

        if (pageName == 'settings') {
            document.getElementById('settings').className = "fa fa-cog active";
            traductor.tradSettings();
        }


        if (pageName == 'login') {
            messages.style.display = 'none';
            friends.style.display = 'none';
            settings.style.display = 'none';
            logout.style.display = 'none';
            traductor.tradLogin();
        }


        if (pageName == 'register') {
            messages.style.display = 'none';
            friends.style.display = 'none';
            settings.style.display = 'none';
            logout.style.display = 'none';
            traductor.tradRegister();
        }


    }

}
