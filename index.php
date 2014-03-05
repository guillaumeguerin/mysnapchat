<html>
	<head>
        <?php
        include("pagehaut.php");
        ?>
	<script type="text/javascript" src="js/cookies.js"></script>	
<script>
function checkSession()
{

var email = getCookie("email");
var password = getCookie("password");

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
		
		}
		else
		{
		messages.style.display = 'none';
		friends.style.display = 'none';
		settings.style.display = 'none';
		logout.style.display = 'none';
		}
    }
  }  
  
xmlhttp.open("POST","php/logindb.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("e="+email+"&p="+password);
}
</script>
	
	</head>


	<body class="homepage" onload="checkSession()">

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
									<h2>Snap Chat Bordeaux</h2>
								</header>
								<p>
                                    <center><a id="signin" href="login.php"><span>Sign In</span></a><label id="bar"> / </label><a id="signup" href="register.php"><span>Sign Up</span></a></center>
                                    <br>
									<label id="description">
									Snap Chat Bordeaux is an application available as a website but also for smartphones.
									</label>
									<p id="testUA">Please activate Javascript.</p>
                                    <br><br>
                                    <center>
                                    <h2>
                                    <a id=laptop href="" class="fa fa-laptop" style="color:rgb(201, 195, 195)"></a>    &nbsp;&nbsp;
                                    <a id=android href="https://build.phonegap.com/apps/638828/download/android" class="fa fa-android" style="color:rgb(201, 195, 195)"></a>   &nbsp;&nbsp;
                                    <a id=apple href="" class="fa fa-apple" style="color:rgb(201, 195, 195)"></a>     &nbsp;&nbsp;
                                    <a id=windows href="https://build.phonegap.com/apps/638828/download/winphone" class="fa fa-windows" style="color:rgb(201, 195, 195)"></a>   &nbsp;&nbsp;
                                    </h2>
                                    <center>

								</p>

							</article>
					</div>
		
				<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
<script>
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.UserAgentIndex();
pm.NavigatorActive('home');
</script>
	</body>
</html>
