<?php

namespace App\Models;

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


    // public function students() {
	// 	return $this->hasMany(Student::class, 'id' , 'student_id' ); 
	// }
    public function students() {
		return $this->hasOne(Student::class, 'id' , 'student_id' ); 
	}
}
