<?php

namespace App\Models;

use App\Models\University;
use App\Models\DegreeUniversity;
use App\Models\SpecialtyUniversity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationUniversity extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'description' ,
        'start',
        'end' ,
        'student_id' ,
        'university_id' ,
        'specialty_id' ,
        'degree_id' ,
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'start' => 'datetime:Y-m-d H:i',
        'end' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */

    public function university() {
		return $this->hasOne(University::class, 'id', 'university_id'); 
	}
    public function specialty() {
		return $this->hasOne(SpecialtyUniversity::class, 'id', 'specialty_id'); 
	}
    public function degreeUniversities() {
		return $this->hasOne(DegreeUniversity::class, 'id' , 'degree_id'); 
	}
    /* ------------------------ End Relations ------------------------ */

}
