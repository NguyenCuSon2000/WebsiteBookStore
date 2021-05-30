<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $table = "discounts";
    protected $fillable = [
        "Product_Id",
        "Percent",
        "Status",
        "BeginDate",
        "EndDate",
        "AddDate"
    ];
    protected $primaryKey = "id";

    public function product()
    {
        return $this->belongsTo("App\Models\Products", "Product_Id");
    }
}
