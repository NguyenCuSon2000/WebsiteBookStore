<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Ward extends Model
{
    //
    protected $table = 'wards';
    protected $fillable = [
    	'ward_id',
		'name',
		'type',
		'location',
		'district_id'
    ];

    protected $primaryKey = 'district_id';

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
