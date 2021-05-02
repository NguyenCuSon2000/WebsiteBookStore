<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table = "order_details";
    protected $fillable = [
        "OrderId",
        "ProductId",
        "Quantity",
        "UnitPrice",
        "AddDate"
    ];
    protected $primaryKey = "id";

    public function order()
    {
        return $this->belongsTo("App\Models\Orders", "OrderId");
    }

    public function product()
    {
        return $this->belongsTo("App\Models\Products","ProductId");
    }
}
