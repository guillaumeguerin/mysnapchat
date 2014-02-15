<!DOCTYPE HTML>
<!--
	Astral 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
									<h2 id="ptitle">Settings</h2>
								</header>
								<p>
									Profile picture :
                                <br><br>
                                    <img src="images/profile_picture.jpg">
                                <br>
                                upload new picture &nbsp;&nbsp;<input type="submit" class="button-small" value="Select" />
											
								</p>
                                <center><div id="deletea" class="button">Delete Account</div></center>
								<section class="is-gallery">

									
								</section>
							</article>
					</div>
		
				<!-- Footer -->
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
document.getElementById('ptitle').innerHTML="Paramètres";
document.getElementById('settings').className="fa fa-cog active";
document.getElementById('deletea').innerHTML="Supprimer le compte";
}
}
</script>

	</body>
</html>
