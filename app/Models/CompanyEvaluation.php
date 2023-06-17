<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyEvaluation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'time',
        'rules_conditions',
        'development',
        'team',
        'remark',
        'apply_id',
        'formation_id',
        'student_id',
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    protected $appends = ['finalMark'];

    public function getFinalMarkAttribute() {
        return ($this->time + $this->rules_conditions + $this->development + $this->team);
    }

    public function students() {
		return $this->hasOne(Student::class, 'id' , 'student_id' ); 
	}  
    public function formations() {
		return $this->hasOne(Formation::class, 'id','formation_id'); 
	} 

    public function applys() {
		return $this->hasOne(Apply::class, 'id' , 'apply_id' ); 
	}  
}
