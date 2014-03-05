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
                                    <?php
                                     if($_GET["type"] == "text"){
                                            echo '<h2><i class="fa fa-comment-o"><span id="ptitle"> &nbsp;&nbsp;Text Message</span></i></h2>';
                                        }
                                        if($_GET["type"] == "music"){
                                            echo '<h2><i class="fa fa-music"><span id="ptitle"> &nbsp;&nbsp;Audio Message</span></i></h2>';
                                        }
                                        if($_GET["type"] == "video"){
                                            echo '<h2><i class="fa fa-film"><span id="ptitle"> &nbsp;&nbsp;Video Message</span></i></h2>';
                                        }
                                        if($_GET["type"] == "picture"){
                                            echo '<h2><i class="fa fa-camera"><span id="ptitle"> &nbsp;&nbsp;Picture Message</span></i></h2>';
                                        }
                                    ?>
								</header>
								<p>

                                    <center>
                                    <!-- NavMessage -->
                                    <label id="newm">Create new message</label><br><br>
                                    <?php
                                    if($_GET["type"] == "text"){
                                        echo '<a id="navmt" href="submitMessage.php?type=text" class="fa fa-comment-o fa-2x" style="color:rgb(0, 0, 0);"></a>';
                                    }
                                    else{
                                        echo '<a id="navmt" href="submitMessage.php?type=text" class="fa fa-comment-o fa-2x" style="color:rgb(201, 195, 195);"></a>';
                                    }
                                    if($_GET["type"] == "picture"){
                                        echo '<a id="navmp" href="submitMessage.php?type=picture" class="fa fa-camera fa-2x" style="margin-left:2em;color:rgb(0, 0, 0);"></a>';
                                    }
                                    else{
                                        echo '<a id="navmp" href="submitMessage.php?type=picture" class="fa fa-camera fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>';
                                    }
                                    if($_GET["type"] == "video"){
                                        echo '<a id="navmv" href="submitMessage.php?type=video" class="fa fa-film fa-2x" style="margin-left:2em;color:rgb(0, 0, 0);"></a>';
                                    }
                                    else{
                                        echo '<a id="navmv" href="submitMessage.php?type=video" class="fa fa-film fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>';
                                    }
                                    if($_GET["type"] == "music"){
                                        echo '<a id="navmm" href="submitMessage.php?type=music" class="fa fa-music fa-2x" style="margin-left:2em;color:rgb(0, 0, 0);"></a>';
                                    }
                                    else{
                                        echo '<a id="navmm" href="submitMessage.php?type=music" class="fa fa-music fa-2x" style="margin-left:2em;color:rgb(201, 195, 195);"></a>';
                                    }
                                    ?>
                                    </center>                                  

                                <p>
                                <center>
                                <?php
                                    if($_GET["type"] == "text" || $_GET["type"] == "music" || $_GET["type"] == "video" ||$_GET["type"] == "picture"){
                                        echo '<form action="sendMessage.php?type='.$_GET["type"].'" method="post">';
                                        echo '<div class="6u" style="margin-bottom:1em;">
                                                    <div class="ui-widget">
												        <input type="text" class="text" name="destinataire" placeholder="Friend" />
                                                    </div>
											    </div>';


                                        echo '<div class="6u" style="margin-bottom:1em;">';

                                        if($_GET["type"] == "text"){
                                            echo '<textarea id="content" class="text" name="content" placeholder="Content" ></textarea>';
                                        }
                                        if($_GET["type"] == "music"){
                                            echo '<input type="file" id="file" class="text" name="file" accept="audio/mp3"/>';
                                        }
                                        if($_GET["type"] == "video"){
                                            echo '<input type="file" id="file" class="text" name="file" accept="video/mp4"/>';
                                        }
                                        if($_GET["type"] == "picture"){
                                            echo '<input type="file" id="file" class="text" name="file" accept="image/*"/>';
                                        }

                                        echo '</div>';


                                        echo '<div class="row">										
											    <div class="12u">
											        <input id="send" class="button" type="submit" value="Send"/>
											    </div>
										    </div>';
                                    }

                                ?>

                              

                                </center>
							</article>
					</div>
		
							<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
			

<script>
var pm = new PageModificator(navigator.userAgent,navigator.language);
pm.NavigatorActive('messageText');
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
