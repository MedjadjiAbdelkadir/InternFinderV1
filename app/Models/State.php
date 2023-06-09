<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Municipal;

class State extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'ar_name',
    ];

    /* ------------------------ Start Relations ------------------------ */
    public function municipals() {
        return $this->hasMany(Municipal::class, 'state_id' , 'id'); 
    }
    /* ------------------------ Start Relations ------------------------ */
}
