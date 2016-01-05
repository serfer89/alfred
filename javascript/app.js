var App = angular.module('App', []);

App.controller('TodoCtrl', function($scope, $http) {
  $http.get('./sys/we.php')
       .then(function(res){
          $scope.todos = res.data;                
        });
});
