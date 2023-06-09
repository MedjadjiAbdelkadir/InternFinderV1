<?php

namespace App\Models;

use App\Models\ListLanguage;
use App\Models\LevelLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model{
    
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'language_id', 'level_id' , 'student_id'

    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function levels() {
        return $this->hasOne(LevelLanguage::class, 'id' , 'level_id'); 
    }

    public function languages() {
        return $this->hasOne(ListLanguage::class, 'id' , 'language_id'); 
    }
    /* ------------------------ End Relations ------------------------ */

}
