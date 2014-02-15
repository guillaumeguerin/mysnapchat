<html>
	<head>
        <?php
        include("pagehaut.php");
        ?>
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
								<section id="gallery" class="is-gallery">
									<div class="row half">
                                        <div class="4u">
											<a href="" class="image image-full"><img src="images/iPhone-5S-app.png" alt=""></a>
										</div>
                                        <div class="4u">
											<a href="" class="image image-full"><img src="images/tablet-app.png" alt=""></a>
										</div>
                                        <div class="4u">
											<a href="" class="image image-full"><img src="images/laptop-app.png" alt=""></a>
										</div>
                                    </div>

									
								</section>
							</article>
					</div>
		
				<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
<script>
document.getElementById('home').className="fa fa-home active";
var ua = navigator.userAgent;
var lang = navigator.language;
var txt;
if (ua!= null) {
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('signin').innerHTML="Se connecter";
document.getElementById('signup').innerHTML="S'enregistrer";
document.getElementById('description').innerHTML="Snap Chat Bordeaux est une application disponible en tant que site web mais également pour smartphones.";
txt = "Vous utilisez un navigateur sous ";
}
else
{
txt = "You are using a brower on ";
}
}

if(ua.indexOf("Android")>0)
{
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
else if(ua.indexOf("Windows Phone")>0)
{
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
else if(ua.indexOf("iPhone OS")>0)
{
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
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
txt += " en français. Vous pouvez télécharger notre application en cliquant ci-dessous.";
}
else if(lang.indexOf("en")>=0)
{
txt += " in english. You can download our application by clicking below.";
}
else
{
txt += ".";
}
}


}

document.getElementById("testUA").innerHTML=txt;

</script>
	</body>
</html>
