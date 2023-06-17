<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentEvaluation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'time',
        'rules_conditions',
        'environment',
        'content',
        'remark',
        'formation_id',
        'student_id',
        'apply_id'
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    protected $appends = ['finalMark'];

    public function getFinalMarkAttribute() {
        return ($this->time + $this->rules_conditions + $this->environment + $this->content);
    }

    public function students() {
		return $this->hasOne(Student::class, 'id' , 'student_id' ); 
	}  

    public function formations() {
		return $this->hasOne(Formation::class, 'id','formation_id'); 
	} 
}
