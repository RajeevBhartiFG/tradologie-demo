<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\UserData;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showData()
    {
        
        $userServiceData = UserData::with('getServiceData')->get();
       $data=[];
       $data['userServiceData'] = $userServiceData;


        return view('admin',$data);
    }


}

