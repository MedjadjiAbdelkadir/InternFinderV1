<?php

namespace App\Models;

use App\Models\State;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipal extends Model{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'post_code',
        'name',
        'ar_name',
        'state_id',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function states() {
        return $this->belongsTo(State::class, 'state_id' , 'id'); 
    }
    public function companies() {
        return $this->hasMany(Company::class, 'municipal_id' , 'id'); 
    }
    public function students() {
        return $this->hasMany(Student::class, 'municipal_id' , 'id'); 
    }
    /* ------------------------ Start Relations ------------------------ */
}
