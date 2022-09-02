<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'provinces';
    protected $fillable = [
    'province_id',
      'name',
      'type'
    ];
    protected $primaryKey = 'province_id';
    
    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }
}
