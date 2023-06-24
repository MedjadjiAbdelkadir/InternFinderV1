<?php

namespace App\Interfaces;

interface HomeInterface{
    public function index();

    public function getAllFormations();

    public function getAllCompanies();

    public function searchFormations($request);
}
