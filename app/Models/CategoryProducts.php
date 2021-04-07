<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    //
    protected $table = "category_products";
    protected $fillable = [
        'CategoryName',
        'Description',
        'Status'
    ];
    protected $primaryKey = "id";
    
    public function products()
    {
        return $this->hasMany("App\Models\Products","Cate_Id");
    }
}
