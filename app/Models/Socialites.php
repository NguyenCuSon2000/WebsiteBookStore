<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialites extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
     "provider_user_id",
     "provider",
     "user_id"
    ];
    protected $primaryKey = "id";
    protected $table = "socialites";
    public function login(){
        return $this->belongsTo("App\User", "user_id");
    }
}
