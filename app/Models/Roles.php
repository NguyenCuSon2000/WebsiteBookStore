<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = "roles";
    protected $fillable = [
        "name",
        "status"
    ];
    protected $primaryKey = "id";

    public function users()
    {
        return $this->hasMany("App\User", "role_id");
    }

   
}
