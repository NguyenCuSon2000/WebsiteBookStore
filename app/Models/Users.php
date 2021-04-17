<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = "users";
    protected $fillable = [
        "email",
        "username",
        "address",
        "phone",
        "password",
        "role_id",
        "remember_token"
    ];
    protected $primaryKey = "id";
    public function role()
    {
        return $this->belongsTo("App\Models\Roles", "role_id");
    }
}
