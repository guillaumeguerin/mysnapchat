var Traductor = function(language){

	this.tradNavBar = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('homespan').innerHTML="Accueil";
				document.getElementById('friendsspan').innerHTML="Amis";
				document.getElementById('settingsspan').innerHTML="Paramètres";
				document.getElementById('logoutspan').innerHTML="Déconnection";
			}
		}
	}


	this.tradIndex = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('signin').innerHTML="Se connecter";
				document.getElementById('signup').innerHTML="S'enregistrer";
				document.getElementById('description').innerHTML="Snap Chat Bordeaux est une application disponible en tant que site web mais également pour smartphones.";
			}
		}
	}

	this.tradRegister = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('titlep').innerHTML="Inscription";
				document.getElementById('signup').value="S'inscrire";
				document.getElementById('name').placeholder="Nom";
				document.getElementById('email').placeholder="Adresse email";
				document.getElementById('password').placeholder="Mot de passe";
				document.getElementById('confirmpassword').placeholder="Confirmation du mot de passe";
				document.getElementById('homespan').innerHTML="Accueil";
			}
		}
	}

	this.tradLogin = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('ptitle').innerHTML="Connection";
				document.getElementById('signin').value="Se connecter";
				document.getElementById('email').placeholder="Adresse email";
				document.getElementById('password').placeholder="Mot de passe";
			}
		}
	}


	/*this.tradMessagePicture = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('selectp').innerHTML="Selectionner une photo";
				document.getElementById('send').innerHTML="Envoyer";
				document.getElementById('openCam').innerHTML="Utiliser la webcam";
				document.getElementById('ptitle').innerHTML=" &nbsp;&nbsp;Message photo";
				document.getElementById('newm').innerHTML="Envoyer un nouveau message";
			}
		}
	}*/



	this.tradMessages = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('newm').innerHTML="Envoyer un nouveau message";				
			}
		}
	}


	this.tradMessageSender = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('send').value="Envoyer";
			}
		}
	}


	this.tradFriends = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('ptitle').innerHTML="Amis";
				//document.getElementById('your-email').placeholder="Votre adresse email";
				document.getElementById('friend-email').placeholder="Adresse email de votre ami";
				document.getElementById('add-friend').value="Ajouter";
			}
		}
	}


	this.tradSettings = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('ptitle').innerHTML="Paramètres";
				document.getElementById('dtitle').innerHTML="Suppression du compte";
				document.getElementById('deletea').value="Supprimer le compte";
				document.getElementById('confirmation').placeholder="Êtes-vous sûr ? Écrivez 'Oui' si vous voulez supprimer votre compte et cliquez sur le bouton.";
			}
		}
	}

	this.tradReponseText = function(text){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				var find,re;
				text = text.replace("Unread messages","Messages non lus");
				text = text.replace("Unread message","Message non lu");
				text = text.replace("Message from","Message de");
				text = text.replace("Welcome to our website ","Bienvenue sur notre site ");
				
				find = " days ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," jours</td>");
				
				find = " day ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," jour</td>");
				
				find = " hours ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," heures</td>");
				
				find = " hour ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," heure</td>");
				
				find = " minutes ago";
				re = new RegExp(find, 'g');
				text = text.replace(re," minutes");
				
				find = " minute ago";
				re = new RegExp(find, 'g');
				text = text.replace(re," minute");
				
				find = " seconds ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," secondes</td>");
				
				find = " second ago</td>";
				re = new RegExp(find, 'g');
				text = text.replace(re," seconde</td>");
				
				find = "<span id=\"view\"> View</span>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<span id=\"view\"> Regarder</span>");
				
				find = "<span id=\"accept\"> Accept</span>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<span id=\"accept\"> Accepter</span>");
				
				find = "<span id=\"refuse\"> Refuse</span>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<span id=\"refuse\"> Refuser</span>");
				
				find = "<span id=\"delete\"> Delete</span>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<span id=\"delete\"> Supprimer</span>");
				
				find = "<h3>You have no friend request</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<h3>Vous n'avez aucune requête d'amis</h3>");
				
				find = "<h3>You have no friend</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<h3>Vous n'avez pas d'amis</h3>");
				
				find = "<h3> You have ";
				re = new RegExp(find, 'g');
				text = text.replace(re,"<h3> Vous avez ");
				
				find = " friend request</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re," requête d'ami</h3>");
				
				find = " friend requests</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re," requêtes d'amis</h3>");
				
				
				find = " friend</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re," ami</h3>");
				
				find = " friends</h3>";
				re = new RegExp(find, 'g');
				text = text.replace(re," amis</h3>");
				
				
				find = "Apply new settings";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Appliquer les nouveaux paramètres");
				
				find = "Your email :";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Votre adresse email :");
				
				find = "Your password :";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Votre mot de passe :");
				
				find = "Your name :";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Votre nom :");
				
				find = "Your description :";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Votre description :");
				
				find = "Your message";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Votre message");
				
				find = "You have written a wrong email or a wrong password.";
				re = new RegExp(find, 'g');
				text = text.replace(re,"Vous avez écrit une mauvaise adresse email ou un mauvais mot de passe.");
				
				find = "I took a screenshot from the message you sent me";
				re = new RegExp(find, 'g');
				text = text.replace(re,"J'ai pris un screenshot du message que vous m'avez envoyé il y a");
				
			}
		}	
			return text;
		
	}
	
	
}


var PageModificator = function(userAgent,language){

	var traductor = new Traductor(language);
	
	
	this.UserAgentIndex = function(){

		var txt;
		if (userAgent != null){
			if(language != null){
				if(language.indexOf("fr") >= 0){
					txt = "Vous utilisez un navigateur sous ";
				}
				else{
					txt = "You are using a brower on ";
				}
			}

			if(userAgent.indexOf("Android") > 0){
				//gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				apple.style.display = 'none';
				windows.style.display = 'none';
				laptop.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';
				txt += "Android";
			}
			else if(userAgent.indexOf("Windows Phone") > 0){
				//gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				apple.style.display = 'none';
				android.style.display = 'none';
				laptop.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';
				txt += "Windows Phone";
			}
			else if(userAgent.indexOf("iPhone OS") > 0){
				//gallery.style.display = 'none';
				messages.style.display = 'none';
				friends.style.display = 'none';
				settings.style.display = 'none';
				logout.style.display = 'none';
				android.style.display = 'none';
				windows.style.display = 'none';
				laptop.style.display = 'none';
				bar.style.display = 'none';
				signin.style.display = 'none';
				txt += "iOS";
			}
			else {
				txt += navigator.platform;
			}
			if(language != null){
				if(language.indexOf("fr") >= 0){
					txt += " en français. Vous pouvez télécharger notre application en cliquant ci-dessous.";
				}
				else if(language.indexOf("en") >= 0){
					txt += " in english. You can download our application by clicking below.";
				}
				else{
					txt += ".";
				}
			}
			
			document.getElementById("testUA").innerHTML=txt;
		}
		
	}

	this.NavigatorActive = function(pageName){

		if(pageName=='home'){
			document.getElementById('home').className="fa fa-home active";
			traductor.tradIndex();
		}

		if(pageName=='messages'){
			document.getElementById('messages').className="fa fa-envelope active";
			traductor.tradMessages();
		}


		if(pageName=='messageVideo'){
			document.getElementById('navmv').style.color="rgb(0, 0, 0)";
			document.getElementById('navmp').style.color="rgb(201, 195, 195)";
			document.getElementById('navmt').style.color="rgb(201, 195, 195)";
			document.getElementById('navmm').style.color="rgb(201, 195, 195)";
			traductor.tradMessageSender();
		}
		
		if(pageName=='messageText'){
			document.getElementById('navmt').style.color="rgb(0, 0, 0)";
			document.getElementById('navmp').style.color="rgb(201, 195, 195)";
			document.getElementById('navmv').style.color="rgb(201, 195, 195)";
			document.getElementById('navmm').style.color="rgb(201, 195, 195)";
			traductor.tradMessageSender();
		}
		
		if(pageName=='messageMusic'){			
			document.getElementById('navmm').style.color="rgb(0, 0, 0)";
			document.getElementById('navmp').style.color="rgb(201, 195, 195)";
			document.getElementById('navmt').style.color="rgb(201, 195, 195)";
			document.getElementById('navmv').style.color="rgb(201, 195, 195)";
			traductor.tradMessageSender();
		}

		if(pageName=='messagePicture'){
			document.getElementById('navmp').style.color="rgb(0, 0, 0)";
			document.getElementById('navmv').style.color="rgb(201, 195, 195)";
			document.getElementById('navmt').style.color="rgb(201, 195, 195)";
			document.getElementById('navmm').style.color="rgb(201, 195, 195)";
			traductor.tradMessageSender();
		}

		if(pageName=='friends'){
			document.getElementById('friends').className="fa fa-user active";
			traductor.tradFriends();
		}

		if(pageName=='settings'){
			document.getElementById('settings').className="fa fa-cog active";
			traductor.tradSettings();
		}


		if(pageName=='login'){
			messages.style.display = 'none';
			friends.style.display = 'none';
			settings.style.display = 'none';
			logout.style.display = 'none';
			traductor.tradLogin();
		}


		if(pageName=='register'){
			messages.style.display = 'none';
			friends.style.display = 'none';
			settings.style.display = 'none';
			logout.style.display = 'none';
			traductor.tradRegister();
		}


	}
	
	this.autoResize = function(id){
	
   document.getElementById(id).style.height = '100%';

}

}


