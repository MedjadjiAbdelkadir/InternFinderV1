<?php

namespace App\Interfaces;

interface HomeInterface{
    public function index();

    public function getAllFormations();

    public function getAllCompanies();

    public function getAllFormationsByCompany($company);

    public function getFormationsById($formation);

    public function searchFormations($request);
}
