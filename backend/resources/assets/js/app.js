/**
 * Created by Tuan on 9/1/15.
 */
'use strict';

angular.module('mulodoCMS', [
    'mulodoCMS.controllers',
    'mulodoCMS.services'
])
    .constant('config', {
        BASE_API: 'http://api.mulodo.dev',
        BASE_AUTH: 'http://api.mulodo.dev/authentication'
    })
    .directive('navBar', function () {
        return {
            restrict: 'E',
            templateUrl: 'layout/navbar.html'
        };
    })
    .directive('footer', function () {
        return {
            restrict: 'E',
            templateUrl: 'layout/footer.html'
        };
    })
    .config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {
        $routeProvider.when('/', {templateUrl: 'layout/home.html', controller: 'HomeController'});
        $routeProvider.when('/signin', {templateUrl: 'auth/login.html', controller: 'HomeController'});
        $routeProvider.when('/user', {templateUrl: 'user/index.html', controller: 'UserListController'});
        $routeProvider.when('/user/create', {templateUrl: 'user/create.form.html', controller: 'UserCreateController'});
        $routeProvider.when('/user/edit/:id', {templateUrl: 'user/edit.form.html', controller: 'UserEditController'});
        $routeProvider.otherwise({redirectTo: '/'});

        $httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
            return {
                'request': function (config) {
                    config.headers = config.headers || {};
                    if ($localStorage.token) {
                        config.headers.Authorization = 'Bearer ' + $localStorage.token;
                    }
                    return config;
                },
                'responseError': function (response) {
                    if (response.status === 401 || response.status === 403) {
                        delete $localStorage.token;
                        $location.path('/signin');
                    }
                    return $q.reject(response);
                }
            };
        }]);
    }])
    .run(['$rootScope', '$location', '$localStorage', function ($rootScope, $location, $localStorage) {
        $rootScope.$on("$routeChangeStart", function (event, next) {
            if ($localStorage.token == null) {
                if (next.access != 'layout/home.html') {
                    $location.path("/signin");
                }
            }
        });
    }]);