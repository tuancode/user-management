/**
 * Created by tuan on 9/10/15.
 */
'use strict';

var services = angular.module('mulodoCMS.services', ['ngResource']);

services.factory('UsersFactory', ['$resource', 'config', function ($resource, config) {
    return $resource(config.BASE_API + '/user', {}, {
        query: {method: 'GET', isArray: true},
        create: {method: 'POST'}
    });
}]);

services.factory('UserFactory', ['$resource', 'config', function ($resource, config) {
    return $resource(config.BASE_API + '/user/:id', {}, {
        show: {method: 'GET'},
        update: {method: 'PUT', params: {id: '@id'}},
        delete: {method: 'DELETE', params: {id: '@id'}}
    });
}]);

services.factory('Auth', ['$http', '$localStorage', 'config', function ($http, $localStorage, config) {
    function urlBase64Decode(str) {
        var output = str.replace('-', '+').replace('_', '/');
        switch (output.length % 4) {
            case 0:
                break;
            case 2:
                output += '==';
                break;
            case 3:
                output += '=';
                break;
            default:
                throw 'Illegal base64url string!';
        }
        return window.atob(output);
    }

    function getClaimsFromToken() {
        var token = $localStorage.token, user = {};
        if (typeof token !== 'undefined') {
            var encoded = token.split('.')[1];
            user = JSON.parse(urlBase64Decode(encoded));
        }
        return user;
    }

    var tokenClaims = getClaimsFromToken();

    return {
        signup: function (data, success, error) {
            $http.post(config.BASE_AUTH + '/signup', data).success(success).error(error);
        },
        signin: function (data, success, error) {
            $http.post(config.BASE_AUTH + '/signin', data).success(success).error(error);
        },
        signout: function (success) {
            tokenClaims = {};
            delete $localStorage.token;
            success();
        },
        getTokenClaims: function () {
            return tokenClaims;
        }
    };
}]);
