<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";
    protected $fillable = [
        'ProductName',
        'Description',
        'Picture',
        'Status'
    ];
    protected $primaryKey = 'id';
    public function category()
    {
        return $this->belongsTo("App\Models\CategoryProducts", 'Cate_Id');
    }
}
