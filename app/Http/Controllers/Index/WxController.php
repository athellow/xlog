<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\WXBizDataCrypt;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $cocde = $request->input('code');

        $data = [
            'status' => 0,
            'data' => [
                'user_id' => 1,
                'session_key' => 'a'.$cocde
            ]
        ];
        
        return response()->json($data);
    }
    
}
