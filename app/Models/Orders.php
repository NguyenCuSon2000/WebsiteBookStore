<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = "orders";
    protected $fillable = [
        "CustomerId",
        "OrderDate",
        "ShippedDate",
        "ShipPhone",
        "ShipAddress",
        "Status",
        "TotalMoney"
    ];
    protected $primaryKey = "id";

    public function customer()
    {
        return $this->belongsTo("App\Models\Customers", 'CustomerId');
    }

    public function order_details()
    {
        return $this->hasMany("App\Models\Order_Details", "OrderId");
    }
}
