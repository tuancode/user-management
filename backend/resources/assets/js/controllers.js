/**
 * Created by tuan on 9/9/15.
 */
'use strict';

var app = angular.module('mulodoCMS.controllers', ['ngRoute', 'angularUtils.directives.dirPagination', 'ngMessages', 'ngStorage']);

app.controller('HomeController', ['$rootScope', '$scope', '$location', '$localStorage', 'Auth',
    function ($rootScope, $scope, $location, $localStorage, Auth) {
        function successAuth(res) {
            $localStorage.token = res.result.access_token;
            window.location = "/";
        }

        $scope.signin = function () {
            var formData = {
                email: $scope.email,
                password: $scope.password
            };

            Auth.signin(formData, successAuth, function () {
                $rootScope.error = 'Invalid Credentials';
            });

        };

        $scope.signup = function () {
            var formData = {
                email: $scope.email,
                password: $scope.password
            };

            Auth.signup(formData, successAuth, function (res) {
                $rootScope.error = res.error || 'Failed to sign up.';
            });
        };

        $scope.signout = function () {
            Auth.signout(function () {
                window.location = "/";
            });
        };
        $scope.token = $localStorage.token;
        $scope.tokenClaims = Auth.getTokenClaims();
    }]);

app.controller('UserListController', ['$scope', '$http', '$route', 'config', 'UsersFactory', 'UserFactory', function ($scope, $http, $route, config, UsersFactory, UserFactory) {
    $scope.users = [];
    $scope.total = 60;
    $scope.perPage = 5;
    getResultsPage(1);

    $scope.pagination = {
        current: 1
    };

    function getResultsPage(pageNumber) {
        $http.get(config.BASE_API + '/user?page=' + pageNumber + '&limit=' + $scope.perPage)
            .then(function (result) {
                var UserResponse = result.data;
                $scope.users = UserResponse.result.data;
                $scope.total = UserResponse.result.total;
            });
    }

    $scope.pageChanged = function (newPage) {
        getResultsPage(newPage);
    };

    $scope.deleteUser = function (userId) {
        var deleteConfirmation = confirm("Are you sure want to delete this member?");
        if (deleteConfirmation) {
            UserFactory.delete({id: userId});
            $route.reload();
        }
    };
}]);

app.controller('UserCreateController', ['$scope', '$http', '$httpParamSerializer', '$location', 'config', 'UsersFactory', function ($scope, $http, $httpParamSerializer, $location, config, UsersFactory) {
    $scope.submit = function () {
        UsersFactory.create($scope.user);
        alert('Added new user successful!');
        $location.path('/user');
    }

    $scope.cancel = function () {
        $location.path('/user');
    };
}]);

app.controller('UserEditController', ['$scope', '$routeParams', '$location', 'UserFactory', function ($scope, $routeParams, $location, UserFactory) {

    $scope.user = UserFactory.show({id: $routeParams.id});

    $scope.submit = function () {
        UserFactory.update($scope.user);
        alert('Udated user successful!');
        $location.path('/user');
    }

    $scope.cancel = function () {
        $location.path('/user');
    };


}]);