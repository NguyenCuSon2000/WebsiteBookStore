<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = "comments";

    protected $fillable = [
        "id", "name", "email", "content", "ProductId"
    ];

    protected $primaryKey = "id";

    public function product()
    {
        return $this->belongsTo("App\Models\Products","ProductId");
    }
}
