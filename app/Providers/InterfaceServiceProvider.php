<?php

namespace App\Providers;

use App\Services\CvService;
use App\Services\AuthService;

use App\Services\ApplyService;
use App\Services\SkillService;

use App\Interfaces\CvInterface;
use App\Interfaces\AuthInterface;

use App\Services\LanguageService;
use App\Interfaces\ApplyInterface;

use App\Interfaces\SkillInterface;
use App\Services\EducationService;

use App\Services\FormationService;
use App\Services\ExperienceService;

use App\Interfaces\LanguageInterface;
use App\Services\CompanyApplyService;

use App\Interfaces\EducationInterface;
use App\Interfaces\ExperienceInterface;
use App\Services\AccountCompanyService;
use App\Services\AccountStudentService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CompanyApplyInterface;
use App\Services\CompanyDashboardService;
use App\Services\CompanyFormationService;
use App\Services\Education\SchoolService;
use App\Services\StudentDashboardService;
use App\Services\StudentFormationService;
use App\Services\CompanyEvaluationService;
use App\Services\StudentEvaluationService;
use App\Interfaces\AccountCompanyInterface;
use App\Interfaces\AccountStudentInterface;
use App\Services\Education\InstituteService;
use App\Interfaces\CompanyDashboardInterface;
use App\Interfaces\CompanyFormationInterface;
use App\Interfaces\Education\SchoolInterface;
use App\Interfaces\StudentDashboardInterface;
use App\Interfaces\StudentFormationInterface;
use App\Services\Education\UniversityService;
use App\Interfaces\CompanyEvaluationInterface;
use App\Interfaces\StudentEvaluationInterface;
use App\Interfaces\Education\InstituteInterface;
use App\Interfaces\Education\UniversityInterface;

class InterfaceServiceProvider extends ServiceProvider{

    public function register(){

        $this->app->bind(AuthInterface::class, AuthService::class );

        $this->app->bind(AccountCompanyInterface::class ,AccountCompanyService::class );
        $this->app->bind(AccountStudentInterface::class ,AccountStudentService::class );
        
        $this->app->bind(UniversityInterface::class ,UniversityService::class );
        $this->app->bind(InstituteInterface::class ,InstituteService::class );
        $this->app->bind(SchoolInterface::class ,SchoolService::class );

        $this->app->bind(CvInterface::class ,CvService::class );
        $this->app->bind(EducationInterface::class ,EducationService::class );

        $this->app->bind(ExperienceInterface::class ,ExperienceService::class );

        $this->app->bind(LanguageInterface::class ,LanguageService::class );

        $this->app->bind(SkillInterface::class ,SkillService::class );

        $this->app->bind(CompanyFormationInterface::class ,CompanyFormationService::class );

        $this->app->bind(ApplyInterface::class ,ApplyService::class );

        $this->app->bind(CompanyApplyInterface::class ,CompanyApplyService::class );

        // StudentFormationService ,, StudentFormationInterface
        $this->app->bind(StudentFormationInterface::class ,StudentFormationService::class );

        $this->app->bind(StudentEvaluationInterface::class ,StudentEvaluationService::class );

        $this->app->bind(CompanyEvaluationInterface::class ,CompanyEvaluationService::class );


        $this->app->bind(StudentDashboardInterface::class ,StudentDashboardService::class );
        $this->app->bind(CompanyDashboardInterface::class ,CompanyDashboardService::class );

    }

    public function boot(){
        //
    }
}
