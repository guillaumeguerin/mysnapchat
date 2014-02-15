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
									<h2 id=ptitle>Friends</h2>
								</header>
                                <p>
									You have 1 friend request.
								</p>
                                <table id="box-table-a">
                                    <tr>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Guillaume Meral</td>
                                        <td><i class="fa fa-check" style="color:rgb(143, 224, 143);"><span>Accept</span></i> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times" style="color:#F76969"><span>Refuse</span></i></td>
                                    </tr>
                                    <!--<tr>
                                        <td>row 2, cell 1</td>
                                        <td>row 2, cell 2</td>
                                    </tr>-->
                                </table>
								<p>
									You have 2 friends. <a href="settings.html"><span>Manage friends</span></a>
								</p>
                                <table id="box-table-a">
                                    <tr>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Marie Omiscar</td>
                                        <td><i class="fa fa-times" style="color:#F76969"><span>Delete</span></i></td>
                                    </tr>
                                    <tr>
                                        <td><img src="images/user_picture2.png" width="0.3em" height="0.3em"></td>
                                        <td>Diallo Aliou</td>
                                        <td><i class="fa fa-times" style="color:#F76969"><span>Delete</span></i></td>
                                    </tr>
                                    <!--<tr>
                                        <td>row 2, cell 1</td>
                                        <td>row 2, cell 2</td>
                                    </tr>-->
                                </table>
								<section class="is-gallery">

									
								</section>
							</article>
					</div>
		
								<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
<script>
document.getElementById('friends').className="fa fa-user active";
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('ptitle').innerHTML="Amis";
}
}
</script>
	</body>
</html>
