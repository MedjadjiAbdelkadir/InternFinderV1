<?php

namespace App\Interfaces;

interface CompanyDashboardInterface{

    // Get All Formations
    public function getAllFormations();
    // Get All Formations By Status
    public function getAllFormationsByStatus($status);

    // Get All Applies
    public function getAllApplies();

    // Get Apply Status
    public function getApplyStatus($status);
    // Get All Applies By Status
    public function getAllAppliesByStatus($status);

    // Get All Evaluation
    public function getAllEvaluations();

}
