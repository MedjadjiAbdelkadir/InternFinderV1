<?php

namespace App\Interfaces; 

// App\Interfaces\AuthInterface


interface AuthInterface{

    // Login
    public function login($request) ;

    // Register Company
    public function registerCompany($request) ;

    // Register Student
    public function registerStudent($request);


    // Logout
    public function logout();



}