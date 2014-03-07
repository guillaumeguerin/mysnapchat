// define angular module/app
var formApp = angular.module('formLoginApp', []);

// create angular controller and pass in $scope and $http
function formController($scope, $http) {

    // create a blank object to hold our form information
    // $scope will allow this to pass between controller and view
    $scope.formData = {};

    // process the form
    $scope.processForm = function() {
        $http({
	        method  : 'POST',
	        url     : 'php/processLogin.php',
	        data    : $.param($scope.formData),  // pass in data as strings
	        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
	        console.log(data);

	        if (!data.success) {
		        // if not successful, bind errors to error variables
		        $scope.errorEmail = data.errors.email;
		        $scope.errorPassword = data.errors.password;
                $scope.errorCaptcha = data.errors.captcha;
	        } else {
		        // if successful, bind success message to message
			        $scope.message = data.message;
	        }
        });

    };

}
