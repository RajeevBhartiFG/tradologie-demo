<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\ServiceData;
use App\Models\UserData;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function showData()
    {
       
        $userServiceData = UserData::with([
            'getServiceData' => function ($q) {
                $q->where('user_id', '=', Auth::user()->id);
            }
        ])->get();

        $data=[];
        $data['userServiceData'] = $userServiceData;

        return view('services.index',$data);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'price' => 'required|integer',
            'message' => 'required|string',
            'userDataId'=> 'required|integer',
        ]);

        $data=[
            'user_id' => Auth::user()->id,
            'user_data_id'=> $request->userDataId,
            'message' => $request->message,
            'price' => $request->price,
        ];
        
        $user_data = ServiceData::create($data);
        return response()->json(['success' => 'Form submitted successfully!']);
    }


}

