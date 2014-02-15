<!DOCTYPE html>
<html>

	<head>
        <?php
        include("pagehaut.php");
        ?>
	</head>
		
	<script>
		var FileAPI = {
			  debug: true
			, media: true
			, staticPath: 'dist/'
		};
	</script>
	
	
		<script src="dist/FileAPI.js"></script>
		<script src="plugins/caman.full.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
	
	
<link rel="stylesheet" href="css/toolkit.css"/>
	<style>
		#PresetFilters a {
			border-radius: 0.2em;
			-webkit-transition: background-color .3s ease-out;
			-moz-transition: background-color .3s ease-out;
			transition: background-color .3s ease-out;
			background-color: rgb(240,230,230);
			display: block;
			float: left;
			text-align: center;

			
			margin: 0.2em;
			border: none;
            padding-left: 0.2em;
            padding-right: 0.2em;
            margin-bottom: 1em;
			cursor: pointer;
		}
		#PresetFilters a.Active {
			background-color: #e69751;
		}
	</style>


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
                                    <h2><i class="fa fa-camera"><span id="ptitle"> &nbsp;&nbsp;Picture Message</span></i></h2>
								</header>
                                <p>
                                    <center>
                                       <!-- NavMessage -->
                                               <?php
									include("navigatorm.php");
									?>
                                    </center>
                                   
<p>
	<div id="output" style="display: none;">

		<div id="result" style="text-align: center; margin: 0 auto;">
			<div class="loader"></div>
		</div>

		<div id="PresetFilters" style="margin-left=0.5em; max-height:6em; overflow-y:scroll; border-style:solid; border-width:5px;">
			<a data-preset="none" class="Active">None</a>			
			<a data-preset="vintage">Vintage</a>
			<a data-preset="lomo">Lomo</a>			
			<a data-preset="clarity">Clarity</a>
			<a data-preset="sinCity">Sin City</a>
			<a data-preset="sunrise">Sunrise</a>
			<a data-preset="crossProcess">Cross Process</a>
			<a data-preset="orangePeel">Orange Peel</a>
			<a data-preset="love">Love</a>
			<a data-preset="grungy">Grungy</a>
			<a data-preset="jarques">Jarques</a>
			<a data-preset="pinhole">Pinhole</a>
			<a data-preset="oldBoot">Old Boot</a>
			<a data-preset="glowingSun">Glowing Sun</a>
			<a data-preset="hazyDays">Hazy Days</a>
			<a data-preset="herMajesty">Her Majesty</a>
			<a data-preset="nostalgia">Nostalgia</a>
			<a data-preset="hemingway">Hemingway</a>
			<a data-preset="concentrate">Concentrate</a>
		</div>
		
	</div>
	
			
	
	
	<div style="text-align: center; clear: both; font-size: 20px;">
	
	<div id="send" class="button" style="display: none; margin-top: 1em;">Send</div>
    <form id ="sendto" action="#" method="post" style="display: none; ">
									<div>
										<div class="row half">
											<div class="6u">
												<input type="text" class="text" name="destinataire" placeholder="Friend" />
											</div>
										</div>

									</div>
								</form>
        <br><br>
		<div id="choose">	
			<label id="selectp" for="browse" class="button">Select picture</label>
			<input id="browse" type="file" accept="image/*" style="display: none;" />

			<br/>
			<br/>

			<div id="openCam" class="button">Use the WebCam</div>
			
		</div>

		<div id="photoBooth" style="visibility: hidden; position: relative; overflow: hidden; margin: 0 auto;">
			<div id="cam" style="border: 2px solid #777; margin: 0 auto;"></div>
			<div id="shot" class="button" style="border-radius: 100%; width: 80px; height: 80px; padding: 0; margin: 30px; "></div>
		</div>
	</div>
								
							</article>
					</div>
		
				

	





				<!-- Footer -->
                <?php
                include("pagebas.php");
                ?>
		
			</div>
	<script>
	var image;
		(function (){
			var
				  file
				, webcam // current Camera
				, filter = 'none' // default filter
				, processing = false
			;

			function _choose(state){
				choose.style.display = state ? '' : 'none';
				photoBooth.style.visibility = !state ? '' : 'hidden';
				photoBooth.style.height = !state ? '' : '20px';
			}

			// Open PhotoBooth
			FileAPI.event.on(openCam, 'click', function (){
				_choose(false);
				output.style.display = 'none';
				send.style.display = 'none';
				sendto.style.display = 'none';				
				work.style.height='75em';
				main.style.height='75em';

				FileAPI.Camera.publish(cam, { width: 640, height: 480 }, function (err, cam){
					if( err ){
						_choose(true);
						alert(err);
					} else {
						webcam = cam;
					}
				});
			});


			// Create shot
			FileAPI.event.on(shot, 'click', function (){
				if( webcam ){
					file = webcam.shot();

					webcam.stop();
					webcam = null;

					_choose(true);
					_applyFilter(true);
				}
			});


			// Open dialog
			FileAPI.event.on(browse, 'change', function (evt){
				file = FileAPI.getFiles(evt)[0];

				if( file ){
					_applyFilter(true);
				}
			});
			
			


			// Set filter
			FileAPI.event.on(PresetFilters, 'click', function (evt){
				var el = evt.target;
			
				if( !processing && el.tagName == 'A' ){
					filter = el.dataset.preset;

					processing = { el: el, html: el.innerHTML };

					el.parentNode.querySelector('.Active').classList.remove('Active');
					el.innerHTML = 'Rendering&hellip;';
					el.className = 'Active';

					_applyFilter();
				}
				});
				
			// Send button
			FileAPI.event.on(send, 'click', function (){
				var canvasData = image.toDataURL("image/png");
				//window.open(strDataURI);
				var ajax = new XMLHttpRequest();
				ajax.open("POST",'save.php',false);
				ajax.setRequestHeader('Content-Type', 'application/upload');
				ajax.send(canvasData);
			});

			function _applyFilter(loading){
				if( loading ){
					result.innerHTML = '<div class="loader"></div>';
				}
				output.style.display = '';
				send.style.display = '';
				sendto.style.display = '';
				work.style.height='75em';
				main.style.height='75em';

				FileAPI.Image(file)
					.resize(800, 600, 'max')
					.filter(filter)
					.get(function (err, img){
						result.innerHTML = '';
						result.appendChild(img);
						image=img;
				

						if( processing ){
							processing.el.innerHTML = processing.html;
							processing = false;
						}
					})
				;
			}
		})();

	</script>
<script>
document.getElementById('messages').className="fa fa-envelope active";
document.getElementById('navmp').style.color="rgb(0, 0, 0)";
var lang = navigator.language;
if(lang !=null){
if(lang.indexOf("fr")>=0)
{
document.getElementById('selectp').innerHTML="Selectionner une photo";
document.getElementById('send').innerHTML="Envoyer";
document.getElementById('openCam').innerHTML="Utiliser la webcam";
document.getElementById('ptitle').innerHTML=" &nbsp;&nbsp;Message photo";
document.getElementById('newm').innerHTML="Envoyer un nouveau message";
}
}
</script>
</body>
</html>
