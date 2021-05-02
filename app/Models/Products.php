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
        'Price',
        'Quantity',
        'Status'
    ];
    protected $primaryKey = 'id';
    
    public function category()
    {
        return $this->belongsTo("App\Models\CategoryProducts", 'Cate_Id');
    }

    public function discounts()
    {
        return $this->hasMany("App\Models\Discount", "Product_Id");
    }

    public function order_details()
    {
        return $this->hasMany("App\Models\OrderDetails","ProductId");
    }
}
