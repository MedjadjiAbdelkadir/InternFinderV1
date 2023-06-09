<?php

namespace App\Models;

use App\Models\DegreeInstitute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationInstitute extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name' ,
        'specialty' ,
        'description' ,
        'start' , 
        'end' ,
        'student_id' ,
        'degree_id' ,
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'start' => 'datetime:Y-m-d H:i',
        'end' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function degreeInstitutes() {
        return $this->hasOne(DegreeInstitute::class, 'id' , 'degree_id'); 
    }
    /* ------------------------ End Relations ------------------------ */
}
