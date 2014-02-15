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
                                    <h2>Messages</h2>
								</header>
                                <p>
                                   <!-- NavMessage -->
								    <?php
									include("navigatorm.php");
									?>
                                    
                                <!--    <table id="box-table-a">
                                    <tr>
                                        <td><a href="" class="fa fa-plus" style="color:rgb(90, 90, 90);"><span> &nbsp;&nbsp; New message</span></i></td>
                                    </tr>
                                </table>
                                -->
								</p>

                                <h3>4 <tag <label id="unreadm">unread messages</label></h3>
								<p>
                                    <table id="box-table-a">
                                    <tr>
                                        <td><a href="texttest.html" class="fa fa-comment-o" style="color:rgb(94,122,193)"><span> &nbsp;&nbsp; View</span></i></td>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Marie Omiscar</td>
                                        <td>2 hours ago</td>
                                    </tr>
                                    <tr>
                                        <td><a href="videotest.html" class="fa fa-film" style="color:rgb(94,122,193)"><span> &nbsp;&nbsp; View</span></i></td>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Marie Omiscar</td>
                                        <td>1 day ago</td>
                                    </tr>
                                    <tr>
                                        <td><a href="imagetest.html" class="fa fa-camera" style="color:rgb(94,122,193)"><span> &nbsp;&nbsp; View</span></i></td>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Diallo Aliou</td>
                                        <td>2 days ago</td>
                                    </tr>
                                    <tr>
                                        <td><a href="soundtest.html" class="fa fa-music" style="color:rgb(94,122,193)"><span> &nbsp;&nbsp; View</span></i></td>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Diallo Aliou</td>
                                        <td>3 days ago</td>
                                        
                                    </tr>
                                </table>
								</p>
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
document.getElementById('messages').className="fa fa-envelope active";
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('newm').innerHTML="Envoyer un nouveau message";
document.getElementById('unreadm').innerHTML="Messages non lus";
}
}
</script>
	</body>
</html>
