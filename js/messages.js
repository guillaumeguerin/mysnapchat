var your_email;
var your_password;
var booleanscreen;
var timeOut;
var timeInter;

function redirectToHomePage () {
	window.location.href = "index.html";	
}


function checkSession() {

    var email = getCookie("email");
    var password = getCookie("password");
    var readedMessage = getCookie("readedmessage");
	if(email!="" && password!="")
		{
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;
            if (reponseText != " You have written a wrong email or a wrong password. ") {
                your_email = email;
                your_password = password;
                if (readedMessage != "") {
                    deleteMessage(readedMessage, true);
                } else {
                    showMessageList();
                }
            } else {
		redirectToHomePage();
            }
        }
    }

    xmlhttp.open("POST", "php/logindb.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("e=" + email + "&p=" + password);
	}
	else
	{
	    redirectToHomePage();
	}
	
}

function showMessageList() {
    if (your_email == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;
            var trad = new Traductor(navigator.language);
            reponseText = trad.tradReponseText(reponseText);
            document.getElementById("txtHint").innerHTML = reponseText;
        }
    }
    xmlhttp.open("POST", "php/getmessagelist.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("email=" + your_email + "&password=" + your_password);
}


function getMessageElement()
  { 
  var video = document.getElementById("video");
  var music = document.getElementById("music");
  if(video != null)
  return video;
  else
  if(music != null)
  return music;
  else return "";
  }
  
  function showMessageTimeout(duration)
  {
  duration = duration / 1000;
  timeInter = setInterval(function(){  
  timeMessage = document.getElementById("timeMessage");
  if(timeMessage != null) 
  {
  timeMessage.innerHTML=duration;
  }
  duration = duration - 1;
  },1000);  
  }
  
  function setMessageTimeout(str)
  { 
  var message_duration=60000;
  var content = getMessageElement();
  if(content!=""){
  content.onloadedmetadata=function () {
  message_duration = message_duration + ((Math.round(content.duration) + 1) * 1000);  
  showMessageTimeout(message_duration);
  timeOut = setTimeout(function () {
                deleteMessage(str, true)
            }, message_duration);
  };
  }
  else
  {
  showMessageTimeout(message_duration);
  timeOut = setTimeout(function () {
                deleteMessage(str, true)
            }, message_duration);
  }
}
  
function showMessage(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }	
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {		
            var reponseText = xmlhttp.responseText;			
			if(!(reponseText.indexOf("Message already watched !")>=0))
			{
            var res = reponseText.split("<content>")[0];
            var trad = new Traductor(navigator.language);
            res = trad.tradReponseText(res);
            var content = reponseText.split("<content>")[1];
            reponseText = res + content;
            document.getElementById("txtHint").innerHTML = reponseText;
            setCookie("readedmessage", str.split("?q=")[1], 30);
            loadEventBeforeUnload(str.split("?")[1]);
            booleanscreen = true;
            loadEventPrintScreen(str.split("?q=")[1]);
			setMessageTimeout(str.split("?q=")[1]);
			}
			else
			{
            var trad = new Traductor(navigator.language);
            reponseText = trad.tradReponseText(reponseText);
			document.getElementById("txtHint").innerHTML = reponseText;
			timeOut = setTimeout(function () {
            showMessageList();
            }, 3000);
			}			
        }
    }
    xmlhttp.open("POST", str.split("?")[0], true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(str.split("?")[1] + "&email=" + your_email + "&password=" + your_password);
}


function showMessagePicture(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
	var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;					
			if(!(reponseText.indexOf("Message already watched !")>=0))
			{
            var res = reponseText.split("<file>")[0];
            var trad = new Traductor(navigator.language);
            res = trad.tradReponseText(res);
            var file = reponseText.split("<file>")[1];
            document.getElementById("txtHint").innerHTML = res;
            FileAPI.Image(file)
                .resize(screen.height / 2, screen.width / 2, 'max')
                .get(function (err, img) {
                    txtHint.appendChild(img);
                });

            setCookie("readedmessage", str.split("?q=")[1], 30);
            loadEventBeforeUnload(str.split("?")[1]);
            booleanscreen = true;
            loadEventPrintScreen(str.split("?q=")[1]);
            setMessageTimeout(str.split("?q=")[1]);
			}
			else
			{
			var trad = new Traductor(navigator.language);
            reponseText = trad.tradReponseText(reponseText);
			document.getElementById("txtHint").innerHTML = reponseText;
			timeOut = setTimeout(function () {
            showMessageList();
            }, 3000);
			}
        }
    }
    xmlhttp.open("POST", str.split("?")[0], true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(str.split("?")[1] + "&email=" + your_email + "&password=" + your_password);
}



function deleteMessage(str, showlist) {
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            setCookie("readedmessage", "", -30);
            unloadEventBeforeUnload();
			clearInterval(timeInter);
			clearTimeout(timeOut);
            if (showlist)
                showMessageList();
        }
    }
    xmlhttp.open("POST", "php/deletemessage.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("q=" + str + "&e=" + your_email);
}



function showMessageSender(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var reponseText = xmlhttp.responseText;
            var trad = new Traductor(navigator.language);
            reponseText = trad.tradReponseText(reponseText);
            document.getElementById("txtHint").innerHTML = reponseText;
            if (str == "picture")
                pm.NavigatorActive('messagePicture');
            else
            if (str == "video")
                pm.NavigatorActive('messageVideo');
            else
            if (str == "text")
                pm.NavigatorActive('messageText');
            else
            if (str == "music")
                pm.NavigatorActive('messageMusic');

            readedMessage = getCookie("readedmessage");
            if (readedMessage != "")
                deleteMessage(readedMessage, false);
        }
    }
    xmlhttp.open("POST", "php/messagesender.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("type=" + str + "&email=" + your_email + "&password=" + your_password);
}



function loadEventBeforeUnload(str) {
    window.onbeforeunload = function (e) {
        var e = e || window.event;

        // For IE and Firefox
        if (e) {
            e.returnValue = 'Are you sure that you want to destroy the message ?';
        }

        // For Safari
        return 'Are you sure that you want to destroy the message ?';
    };


    window.onunload = function () {
        deleteMessage(str, true);
    };
}


function unloadEventBeforeUnload() {
    window.onbeforeunload = function () {};
    window.onunload = function () {};
}


function loadEventPrintScreen(str) {

    function kPress(e) {
        var c = e.keyCode || e.charCode;
        if (c == 44) {
            if (booleanscreen) {
                sendScreenshotAlert(str);
                booleanscreen = false;
            }
            alert("Screenshot Detected");
        }
    }

    window.addEventListener("keyup", kPress, false);
}

function sendScreenshotAlert(str) {
    var xmlhttp = createXmlHttpRquestObject();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    }
    xmlhttp.open("POST", "php/messages/sendscreenshotalert.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("q=" + str + "&e=" + your_email);
}

function sendMessage(obj, type) {
    var booleansize = true;
    var booleantype = false;
    var receiver = obj.receiver.value;

    var data = new FormData();

    if (type == "text") {
        var content = obj.content.value;
		
		find = "'";
        re = new RegExp(find, 'g');
        content = content.replace(re, "\\'");
		
        booleantype = true;
        data.append('content', content);
    } else {
        var content = obj.content.files[0];
        var typem;


        if (type == "music")
            typem = "audio/mpeg";
        if (type == "video")
            typem = "video/mp4";
        if (type == "picture")
            typem = "image";
        if (typeof content != 'undefined') {
            if (content.type.indexOf(typem) == 0) {
                booleantype = true;
                if (content.size > 10485760)
                    booleansize = false;
                else
                    data.append('file', content);
            }
        }


    }

    if (booleantype) {
        if (booleansize) {
            document.getElementById("messageSendertxtHint").innerHTML = "";
            data.append('receiver', receiver);
            data.append('type', type);
            data.append('email', your_email);
            data.append('password', your_password);

            var xmlhttp = createXmlHttpRquestObject();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showMessageList();
                }
            }

            xmlhttp.upload.addEventListener('progress', function (e) {
                progressbar.style.width = Math.round((e.loaded / e.total) * 100) + '%';
                progressbarpercent.innerHTML = Math.round((e.loaded / e.total) * 100) + '%';
            }, false);

            xmlhttp.open("POST", "php/sendmessage.php", true);
            xmlhttp.send(data);
        } else {
            if (navigator.language != null) {
                if (navigator.language.indexOf("fr") >= 0)
                    document.getElementById("messageSendertxtHint").innerHTML = "Votre fichier est trop gros, il doit faire moins de 10 MO.";
            } else
                document.getElementById("messageSendertxtHint").innerHTML = "Your file is too big it should be less than 10 MB.";
        }
    } else {
        if (navigator.language != null) {
            if (navigator.language.indexOf("fr") >= 0) {
                var typeReponse;
                if (type == "music")
                    typeReponse = "musique";
                if (type == "video")
                    typeReponse = "vidéo";
                if (type == "picture")
                    typeReponse = "image";
                document.getElementById("messageSendertxtHint").innerHTML = "Votre fichier n'est pas une " + typeReponse + ".";
            }
        } else
            document.getElementById("messageSendertxtHint").innerHTML = "Your file isn't a " + type + ".";
    }
}
