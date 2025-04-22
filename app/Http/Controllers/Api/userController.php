<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            'users'=> $users,
            'status' => 404,
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required'
        ]);
        
        if ($validator->fails()) {
            $data = [
                'message' => 'Validation error',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if(!$user){
            $data = [
                'message' => 'User not created',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        
        $data = [
            'user' => $user,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
