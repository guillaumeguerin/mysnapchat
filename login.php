<html>
	<head>
        <?php
        include("pagehaut.php");
        ?>
		
<script type="text/javascript" src="js/cookies.js"></script>
<script>	
		
		
function login()
{

var email = document.getElementById("email").value;
var password = document.getElementById("password").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {	
	var reponseText = xmlhttp.responseText;
		if(reponseText==" true ")
		{
		document.getElementById("txtHint").innerHTML="";
		setCookie("email",email,30);
		setCookie("password",password,30);
		//document.getElementById("txtHint").innerHTML=getCookie("email")+" "+getCookie("password");
		window.location.href = "index.php";
		}
		else
		document.getElementById("txtHint").innerHTML=reponseText;
    }
  }  
  
xmlhttp.open("POST","php/logindb.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+email+"&p="+password);
}
</script>	
	</head>
	<body class="homepage">

		<!-- Wrapper-->
			<div id="wrapper">
				
					<!-- Nav -->
                <?php
                include("navigator.php");				
                ?>

				<!-- Main -->
					<div id="main">
							<article id="work" class="panel">
								<header>
									<h2 id="ptitle">Sign In</h2>
								</header>
								<div id="txtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b></b></div>
                                <form onsubmit="login()" method="post" action="javascript:void(0);">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="email" id="email"  placeholder="Email" required/>
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<input type="password" class="text" name="password" id="password" placeholder="Password" required/>
											</div>
										</div>
                                        <!--<br>
                                          <script type="text/javascript"
                                             src="http://www.google.com/recaptcha/api/challenge?k=6Lf2le4SAAAAALxgA9l7CBqllSYOFtFdoeC3KnxP">
                                          </script>
                                          <noscript>
                                             <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lf2le4SAAAAALxgA9l7CBqllSYOFtFdoeC3KnxP"
                                                     frameborder="0">
                                             </iframe><br>
                                             <textarea name="recaptcha_challenge_field" rows="3" cols="40">
                                             </textarea>
                                             <input type="hidden" name="recaptcha_response_field"
                                                 value="manual_challenge">
                                          </noscript>
                                        <br>-->
										<div class="row">
											<div class="12u">
												<input id="signin" type="submit" class="button" value="Sign in" />
											</div>
										</div>
									</div>
								</form>

							</article>
					</div>
		
				<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>

<script>
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('login');
</script>

	</body>
</html>
