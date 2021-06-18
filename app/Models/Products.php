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
        'Status',
        'Cate_Id'
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

    public function pictures()
    {
        return $this->hasMany("App\Models\Picture","ProductId");
    }

    public function comments()
    {
        return $this->hasMany("App\Models\Comments","ProductId");
    }
}
