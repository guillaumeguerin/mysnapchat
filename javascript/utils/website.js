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


	this.tradMessagePicture = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('selectp').innerHTML="Selectionner une photo";
				document.getElementById('send').innerHTML="Envoyer";
				document.getElementById('openCam').innerHTML="Utiliser la webcam";
				document.getElementById('ptitle').innerHTML=" &nbsp;&nbsp;Message photo";
				document.getElementById('newm').innerHTML="Envoyer un nouveau message";
			}
		}
	}



	this.tradMessages = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('newm').innerHTML="Envoyer un nouveau message";
				document.getElementById('unreadm').innerHTML="Messages non lus";
			}
		}
	}


	this.tradMessageVideo = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('send').value="Envoyer";
				document.getElementById('newm').innerHTML="Envoyer un nouveau message";
				document.getElementById('ptitle').innerHTML=" &nbsp;&nbsp;Message Vidéo";
			}
		}
	}


	this.tradFriends = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('ptitle').innerHTML="Amis";
			}
		}
	}


	this.tradSettings = function(){
		if(language != null){
			if(language.indexOf("fr") >= 0){
				document.getElementById('ptitle').innerHTML="Paramètres";
				document.getElementById('deletea').innerHTML="Supprimer le compte";
			}
		}
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
				gallery.style.display = 'none';
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
				gallery.style.display = 'none';
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
				gallery.style.display = 'none';
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
			//document.getElementById('home').className="fa fa-home active";
			traductor.tradIndex();
		}

		if(pageName=='messages'){
			document.getElementById('messages').className="fa fa-envelope active";
			traductor.tradMessages();
		}


		if(pageName=='messageVideo'){
			document.getElementById('messages').className="fa fa-envelope active";
			document.getElementById('navmv').style.color="rgb(0, 0, 0)";
			traductor.tradMessageVideo();
		}

		if(pageName=='messagePicture'){
			document.getElementById('messages').className="fa fa-envelope active";
			document.getElementById('navmp').style.color="rgb(0, 0, 0)";
			traductor.tradMessagePicture();
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
			//messages.style.display = 'none';
			//friends.style.display = 'none';
			//settings.style.display = 'none';
			//logout.style.display = 'none';
			traductor.tradRegister();
		}


	}

}
