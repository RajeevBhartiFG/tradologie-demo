<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceData extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUser()
	{
		return $this->hasOne('App\Models\User','id','user_id');
	}
    public function getUserData()
	{
		return $this->belongsTo('App\Models\UserData','user_data_id','id');
	}
    
}
