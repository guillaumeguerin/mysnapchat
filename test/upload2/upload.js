function init() {
	document.getElementById('file_upload_form').onsubmit=function() {
		document.getElementById('file_upload_form').target = 'upload_target'; //'upload_target' is the name of the iframe
	}
}
window.onload=init;