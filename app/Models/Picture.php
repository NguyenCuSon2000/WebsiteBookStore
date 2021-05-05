<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    protected $table = "pictures";

    protected $fillable = [
        "id",
        "picture",
        "ProductId"
    ];

    protected $primaryKey = "id";

    public function product()
    {
        return $this->belongsTo("App\Models\Products","ProductId");
    }
}
