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
        'development',
        'team',
        'remark',
        'formation_id',
        'student_id',
    ];
    protected $appends = ['average'];

    public function getAverageAttribute() {
        return ($this->time + $this->rules_conditions + $this->development + $this->team) / 4;
    }
}
