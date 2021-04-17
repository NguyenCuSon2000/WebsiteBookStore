<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
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

}
