<?php

namespace App\Models;

use App\Models\State;
use App\Models\Formation;
use App\Models\Municipal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'companies' ;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'company_type',
        'category',
        'municipal_id',
        'address',
        'description',
        'avatar',
    ];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i'
    ];

    /* --------- Start Get && Set Attributes --------- */
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    /* --------- End Get && Set Attributes --------- */

    
    /* ------------------------ Start Relations ------------------------ */
    public function municipals() {
        return $this->hasOne(Municipal::class, 'id' , 'municipal_id'); 
    }

    public function formations() {
		return $this->hasMany(Formation::class, 'company_id' , 'id'); 
	}
    /* ------------------------ Start Relations ------------------------ */
}
