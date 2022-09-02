<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'districts';
    protected $fillable = [
    	'district_id',
		'name',
		'type',
		'location',
		'province_id'
    ];
    protected $primaryKey = "district_id";

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    
    public function wards()
    {
        return $this->hasMany(Ward::class,'district_id');
    }
}
