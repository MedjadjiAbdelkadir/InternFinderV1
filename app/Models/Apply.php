<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apply extends Model{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'student_id',
        'formation_id',
        'status',

    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];
    
    public function formations() {
		return $this->hasOne(Formation::class, 'id','formation_id' ); 
	}

//     @if( ($applicant->created_at - Carbon\Carbon::now()) <= Carbon\Carbon::now()->subDays(30) )
//     {{ $applicant->created_at->diffForHumans(); }}
// @else
//     {{ $applicant->created_at->format('j M Y , g:ia') }}
// @endif --}}


    // public function students() {
	// 	return $this->hasMany(Student::class, 'id' , 'student_id' ); 
	// }

    public function getCreatedAtAttribute($value){

        if(Carbon::now()->diffInMonths($value) >= 1){
            return Carbon::parse($value)->format('d/m/Y');
        }else{
            return Carbon::parse($value)->diffForHumans();
        }
    }
    public function students() {
		return $this->hasOne(Student::class, 'id' , 'student_id' ); 
	}


}
