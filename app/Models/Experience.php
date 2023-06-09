<?php

namespace App\Models;

use App\Models\Job;
use App\Models\DurationExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    use SoftDeletes;
    //  // 

    protected $fillable = [
        'specialty' , 
        'description' ,
        'company' ,
        'duration_id' , 
        'job_id',
        'student_id'
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',

    ];
    /* ------------------------ Start Relations ------------------------ */
    public function jobs() {
        return $this->hasOne(Job::class, 'id' , 'job_id'); 
    }
    public function durations() {
        return $this->hasOne(DurationExperience::class, 'id' , 'duration_id'); 
    }
    /* ------------------------ End Relations ------------------------ */

}
