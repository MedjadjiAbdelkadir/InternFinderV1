<?php

namespace App\Models;

use App\Models\DurationExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationExperience extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specialty' , 
        'duration_id' , 
        'formation_id'
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function durations() {
        return $this->hasOne(DurationExperience::class, 'id' , 'duration_id'); 
    }
    /* ------------------------ End Relations ------------------------ */

}
