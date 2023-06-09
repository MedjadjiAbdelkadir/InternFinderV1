<?php

namespace App\Models;

use App\Models\Cv;
use Carbon\Carbon;
use App\Models\Apply;
use App\Models\State;

use App\Models\Municipal;
use App\Models\EducationSchool;
use App\Models\EducationInstitute;
use App\Models\EducationUniversity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable {

    use HasFactory;
    use SoftDeletes;
    protected $table ='students';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'municipal_id',
        'password',
        'dateBirth',
        'gender',
 
        // 'avatar',
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'dateBirth' => 'datetime:Y-m-d H:i',
    ];


    /* --------- Start Get && Set Attributes --------- */
    public function getFirstNameAttribute($value){
        return ucfirst($value);
    }
    public function getLastNameAttribute($value){
        return ucfirst($value);
    }
    protected $appends = ['full_name'];

    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . '_' . ucfirst($this->last_name);
    }


    public function getApplyAttribute() {

        if(!empty(auth('student')->user()->applies)){
            foreach(auth('student')->user()->applies as $apply){
                    echo $apply->formation_id . '<br>';
            }
        }else{
            return null;
        }
    }

    public function setDateBirthAttribute($value){
        $this->attributes['dateBirth'] = Carbon::parse($value)->format('Y-m-d') ;
        // $this->attributes['dateBirth'] =
        // Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d');
    }
    
    /* --------- End Get && Set Attributes --------- */

    /* ------------------------ Start Relations ------------------------ */
    public function municipals() {
        return $this->hasOne(Municipal::class, 'id' , 'municipal_id'); 
    }
    
	// public function cv() {
	// 	return $this->hasOne(Cv::class, 'student_id' , 'id'); 
	// }

    public function universityEducations() {
		return $this->hasMany(EducationUniversity::class, 'student_id' , 'id'); 
	}
    public function instituteEducations() {
		return $this->hasMany(EducationInstitute::class, 'student_id' , 'id'); 
	}
    public function schoolEducations() {
		return $this->hasMany(EducationSchool::class, 'student_id' , 'id'); 
	}
    public function experiences() {
		return $this->hasMany(Experience::class, 'student_id' , 'id'); 
	}

    public function languages() {
		return $this->hasMany(Language::class, 'student_id' , 'id'); 
	}

    public function applies() {
		return $this->hasMany(Apply::class, 'student_id' , 'id'); 
	}

	/* ------------------------ End Relations ------------------------ */

}
