<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Models\UserData;
use Carbon\Carbon;
 

class UserDataController extends Controller
{
    public function showData()
    {

        
        $userServiceData = UserData::with('getServiceData')->where('user_id', Auth::user()->id)->get();
            
       // dd($userServiceData[0]->getServiceData[0]->getUser);

      // dd($userServiceData[1]->getServiceData);

       $data=[];
       $data['userServiceData'] = $userServiceData;

        return view('users.index', $data);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'message' => 'required|string',
            'datetime'  => 'required',
        ]);

        $time = strtotime($request->datetime);
        //$startTime = date("H:i", strtotime('-30 minutes', $time));
        $endTime = date("H:i", strtotime('+30 minutes', $time));
        $data=[
            'user_id' => Auth::user()->id,
            'service_name' => $request->name,
            'message' => $request->message,
            'price' => $request->price,
            'service_start' => Carbon::parse($request->datetime)->format('Y-m-d H:i:s'),
            'service_end' => Carbon::parse($endTime)->format('Y-m-d H:i:s'),
        ];
        
        $user_data = UserData::create($data);
        return response()->json(['success' => 'Form submitted successfully!']);

        
    }

}

