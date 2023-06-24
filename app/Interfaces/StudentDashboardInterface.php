<?php

namespace App\Interfaces;

interface StudentDashboardInterface{
    // Get  All Evaluation
    public function getAllEvaluations();

    // Get  All Formations
    public function getAllFormations();

    // Get  Rejected Formations
    public function getRegisteredFormations();

    // Get  Readay Formations
    public function getReadyFormations();

    // Get  Rejected Formations
    public function getRejectedFormations();

    // Get  Accept Formations
    public function getAcceptableFormations();

    // Get  Current Formations
    public function getCurrentFormations();

    // Get Finished Formations
    public function getFinishedFormations();
}
