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
						<a id ="home" href="index.html" class="fa fa-home active"><span id="homespan">Home</span></a>
					</nav>

				<!-- Main -->
					<div id="main">
							<article id="work" class="panel">
								<header>
									<h2 id="ptitle">Sign In</h2>
								</header>
                                        <?php
                                        include("connectdb.php");
                                        echo $db_host;
                                        ?>
								<form action="#" method="post">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="email" placeholder="Email" />
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<input type="password" class="text" name="password" placeholder="Password" />
											</div>
										</div>
                                        <br>
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
												<input id="signin" type="submit" class="button" />
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
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('ptitle').innerHTML="Connection";
document.getElementById('signin').value="Se connecter";
}
}
else
document.getElementById('signin').value="Sign in"
</script>

	</body>
</html>
