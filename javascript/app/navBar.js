var navBar = angular.module('navBar', []);

navBar.controller('navBarController', function($scope, $sce) {

    $scope.snippet = '<a id ="home" href="index.html" class="fa fa-home"><span id="homespan">Home</span></a>';

    $scope.displayNavBar = function() {
        return $sce.trustAsHtml($scope.snippet);
    };
});
