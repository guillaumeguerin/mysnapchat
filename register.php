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
									<h2 id="titlep">Sign up</h2>
								</header>
								<form action="checkregister.php" method="post">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="name" id="name" placeholder="Name" required/>
											</div>
											<div class="6u">
												<input type="text" class="text" name="email" id="email" placeholder="Email" required/>
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<input type="password" class="text" name="password" id="password" placeholder="Password" required/>
											</div>
                                            <div class="6u">
												<input type="password" class="text" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required/>
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<textarea name="description" id="description" placeholder="Description"></textarea>
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
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('register');
</script>
	</body>
</html>
