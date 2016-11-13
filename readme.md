# CMS example in Laravel 5
A Single-page application example building with Laravel and Angularjs. Project will have two parts, back-end and front-end run separately. 

It handles a management user. Some technicals applied to this project:
- Restful webservice
- Token-based authentication
- Validation
- Paging
- Middleware
- Exception handle
- Elixir
- PHP artisan
- NPM
- Composer
- Responsive
- Resolve Cross-origin resource sharing
- HTML5 local storage

============
TODO:

- Make Sign Up feature.
- Write unit test for back-end API

Requirements
------------

- Vagrant 1.7.4 or later
- Virtual Box 5.0 or later
- Laravel/Homestead 2.1.6 or later

## Installation
1. Pull source code from github.

        $ git clone git@github.com:Mulodo-PHP-Laravel-Training/tuan-vu-sample-project-1.git
    
2. Configuring homestead. To prepare homestead runner, we will have to add some configurations for folders, sites, databases as below to Homestead.yaml file

        - folders: 
            - map: /your/path/tuan-vu-sample-project-1/backend
              to: /home/vagrant/Code/backend
              type: "nfs"
            - map: /your/path/tuan-vu-sample-project-1/frontend
              to: /home/vagrant/Code/frontend
              type: "nfs"
        - sites:
            - map: api.mulodo.dev
              to: /home/vagrant/Code/backend/public
            - map: cms.mulodo.dev
              to: /home/vagrant/Code/frontend
        databases:
            - mulodo

3. Configuring DNS for local run. In hosts file of your computer. Add

        192.168.10.10 api.mulodo.dev
        192.168.10.10 cms.mulodo.dev
    
4. Preparing database. We need to prepare default database for the first time use. At backend folder, run:

        $ php artisan migrate
        $ php artisan db:seed

5. Set the application key for back-end. At backend folder, run:

        $ php artisan key:generate

6. Start homestead for using

        $ homestead up
    
## Usage
We have a default login user for testing. You didn't build sign up function yet.

    Email   :   test@mulodo.com
    Password:   mulodotest

The project have an UI for client using. You can access via:

    http://cms.mulodo.dev
    
You also can directly access back-end API via Restful webservice as below:

    Method  |                  URI                          |                 Parameters              |  Token    |        Action         |
    --------------------------------------------------------------------------------------------------------------------------------------
    POST    | http://api.mulodo.dev/authentication/signin   | email, password                         | None      | Api authentication    |
    GET     | http://api.mulodo.dev/user                    | None                                    | Yes       | User list receipt     | 
    GET     | http://api.mulodo.dev/user/{id}               | id                                      | Yes       | User detail receipt   |
    POST    | http://api.mulodo.dev/user                    | firstName, lastName, email, password    | Yes       | User registration     |
    PUT     | http://api.mulodo.dev/user/{id}               | id                                      | Yes       | User updating         |
    DELETE  | http://api.mulodo.dev/user/{id}               | id                                      | Yes       | User remove           |

Pass Token to API

    Method: Header
    Attribute: Authorization
    Token format: Bearer {token}
    For example:
    - Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2FwaS5tdWxvZG8uZGV2XC9hdXRoZW50aWNhdGlv blwvc2lnbmluIiwiaWF0IjoiMTQ0MjIwNDE5OSIsImV4cCI6IjE0NDIyMDc3OTkiLCJuYmYiOiIxNDQyMjA0MTk5IiwianRpIjoiZjkxYTUyOTM4OTMyNmRlMzdiMzNkYjIyNDU0NmZjNjkifQ .buLjSa10KI2Nk0kfzhCYJmaa3GrpYqZiXYeFK5iDq-8

## Credit

Special thanks to **Mrs. Tien**, **Mr. Tam**, **Mr. Tuan Nguyen** and **Mr. Kondo** have supported me to complete this project.

The project was created rely on frameworks **Laravel 5.1**, **AngularJS 1.4.7**, **Bootstrap 3.3.5**.

In addition, it also used packages as below:

Back-end

    jwt-auth: https://github.com/tymondesigns/jwt-auth
    laravel-cors: https://github.com/barryvdh/laravel-cors
    
Front-end

    ngRoute: https://docs.angularjs.org/api/ngRoute
    angularUtils.directives.dirPagination: https://github.com/michaelbromley/angularUtils/tree/master/src/directives/pagination
    ngMessages: https://docs.angularjs.org/api/ngMessages
    ngStorage: https://github.com/gsklee/ngStorage
    ngResource: https://docs.angularjs.org/api/ngResource
    
I also reference the articles as below:

- http://laravel.com/docs/5.1
- https://docs.angularjs.org/api
- http://campus.codeschool.com/courses/shaping-up-with-angular-js/
- http://www.toptal.com/web/cookie-free-authentication-with-json-web-tokens-an-example-in-laravel-and-angularjs

## Authors
Tuan Vu tuanvu.se@gmail.com
