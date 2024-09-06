<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getServiceData()
	{
		return $this->hasMany('App\Models\ServiceData','user_data_id','id');
	}
    public function getUser()
	{
		return $this->hasOne('App\Models\User','id','user_id');
	}
 
}
