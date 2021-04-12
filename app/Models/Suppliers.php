<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //
    protected $table = "suppliers";
    protected $fillable = [
        'SupplierName',
        'Address',
        'Phone',
        'Email'
    ];
    protected $primaryKey = 'id';
}
