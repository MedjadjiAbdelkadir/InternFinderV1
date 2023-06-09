<?php

namespace App\Models;

use App\Models\DegreeUniversity;
use App\Models\SpecialtyUniversity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationEducationUniversity extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specialty_id',
        'degree_id',
        'formation_id'
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */

    public function specialty() {
        return $this->hasOne(SpecialtyUniversity::class, 'id', 'specialty_id'); 
    }
    public function degreeUniversities() {
        return $this->hasOne(DegreeUniversity::class, 'id' , 'degree_id'); 
    }
    /* ------------------------ End Relations ------------------------ */
    
}
