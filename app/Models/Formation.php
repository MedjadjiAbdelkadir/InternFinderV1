<?php

namespace App\Models;

use App\Models\Apply;
use App\Models\Company;
use App\Models\Municipal;
use App\Models\FormationLanguage;
use App\Models\FormationExperience;
use App\Models\SpecialtyUniversity;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormationEducationSchool;
use App\Models\FormationEducationInstitute;
use App\Models\FormationEducationUniversity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'nbr_place',
        'permanence',
        'description',
        'start', 
        'end',
        'company_id',
        'municipal_id',
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'start' => 'datetime:Y-m-d H:i',
        'end' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function company() {
		return $this->belongsTo(Company::class, 'company_id' , 'id'); 
	}

    public function municipals() {
        return $this->hasOne(Municipal::class, 'id' , 'municipal_id'); 
    }
    public function formationUniversityEducations() {
		return $this->hasMany(FormationEducationUniversity::class, 'formation_id' , 'id'); 
	}
    public function formationInstituteEducations() {
		return $this->hasMany(FormationEducationInstitute::class, 'formation_id' , 'id'); 
	}
    public function formationSchoolEducations() {
		return $this->hasMany(FormationEducationSchool::class, 'formation_id' , 'id'); 
	}

    public function formationExperiences() {
		return $this->hasMany(FormationExperience::class, 'formation_id' , 'id'); 
	}

    public function formationLanguages() {
		return $this->hasMany(FormationLanguage::class, 'formation_id' , 'id'); 
	}

  public function participants() {
		return $this->hasMany(Apply::class, 'formation_id' , 'id'); 
	}


	/* ------------------------ End Relations ------------------------ */
}
