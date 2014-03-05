<!-- Nav -->
<script src="js/cookies.js"></script>
<script>
function flogout()
{
setCookie("email","",-30);
setCookie("password","",-30);
}
</script>
<nav id="nav">
	<a id ="home" href="index.php" class="fa fa-home"><span id="homespan">Home</span></a>
	<a id ="messages" href="messages.php" class="fa fa-envelope"><span id="messagespan">Messages</span></a>
	<a id ="friends" href="friends.php" class="fa fa-user"><span id="friendsspan">Friends</span></a>
	<a id ="settings" href="settings.php" class="fa fa-cog"><span id="settingsspan">Settings</span></a>
	<a id="logout" onclick="flogout()" href="index.php"  class="fa fa-ban"><span id="logoutspan">Log out</span></a>
</nav>
<script src="js/website.js"></script>
<script>
var trad = new Traductor(navigator.language);
trad.tradNavBar();
</script>
