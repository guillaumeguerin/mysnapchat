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
					<nav id="nav">
						<a id ="home" href="index.php" class="fa fa-home"><span id="homespan">Home</span></a>
					</nav>

				<!-- Main -->
					<div id="main">
							<article id="work" class="panel">
								<header>
									<h2 id="titlep">Sign up</h2>
								</header>
								<form action="checkregister.php" method="post">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="6u">
												<input type="text" class="text" name="email" id="email" placeholder="Email" />
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<input type="password" class="text" name="password" id="password" placeholder="Password" />
											</div>
                                            <div class="6u">
												<input type="password" class="text" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" />
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<textarea name="description" id="description" placeholder="Description"></textarea>
											</div>
										</div>
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
                                        <br>
										<div class="row">
											<div class="12u">
												<input id="signup" type="submit" class="button" value="Sign up" />
											</div>
										</div>
									</div>
								</form>
                                <?php
                                  
                                  echo $db_host;
                                ?>
							</article>
					</div>
		
				<!-- Footer -->
                <?php
                include("pagebas.php");
                mysql_close();
                ?>
		
			</div>
<script>
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('titlep').innerHTML="Inscription";
document.getElementById('signup').value="S'inscrire";
document.getElementById('name').placeholder="Nom";
document.getElementById('email').placeholder="Adresse email";
document.getElementById('password').placeholder="Mot de passe";
document.getElementById('confirmpassword').placeholder="Confirmation du mot de passe";
document.getElementById('homespan').innerHTML="Accueil";
}
}
</script>
	</body>
</html>
