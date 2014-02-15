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
                                    <h2><i class="fa fa-film"><span id="ptitle"> &nbsp;&nbsp;Video Message</span></i></h2>
								</header>
								<p>
                                    <center>
                                       <!-- NavMessage -->
                                               <?php
									include("navigatorm.php");
									?>
                                    </center>
                                   
<p>
                                <form action="#" method="post">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="destinataire" placeholder="Friend" />
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<input type="file" id="file" class="text" name="file" accept="video/mp4"/>
											</div>
										</div>
										<div class="row">										
											<div class="12u">
											<input id="send" class="button" type="submit"/>
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
document.getElementById('messages').className="fa fa-envelope active";
document.getElementById('navmv').style.color="rgb(0, 0, 0)";
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('send').value="Envoyer";
document.getElementById('newm').innerHTML="Envoyer un nouveau message";
document.getElementById('ptitle').innerHTML=" &nbsp;&nbsp;Message Vidéo";
}
}
else
document.getElementById('send').value="Send";
</script>
 <script type="text/javascript">// marche pas
            window.addEvent('load', function() {
                var fl = document.getElementById('file');

                fl.onchange = function(e){ 
                    var ext = this.value.match(/\.(.+)$/)[1];
                    switch(ext)
                    {
                        case 'mp4':
                        case 'mpeg4':
                            alert('allowed');
                            break;
                        default:
                            alert('This file format is not allowed. Use mp4 only.');
                            this.value='';
                    }
                };

            });
        </script>

	</body>
</html>
