<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth extends Controller
{
    
  
    public function register(Request $request)
    {
//$request->all()kyakhd ga3 data li dkhlt o validator kay validihz 
      $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
// $validator->fails() had fonction kat verifier wach data li dkhlt kt7tarm les condition li drt 3liha 
//ila kant data s7i7a ktrj3 false sinon ktrj3 true
        if ($validator->fails()) {
            //ila fchl validation rah response ghtkon 3la chkl json trj3 status o errors
            return response()->json([
                'status' => '0',
                //had fonction ktrj3 akhta2 li w93o
                'errors' => $validator->errors()
            ]);
        }
//ghycreer User b data li rani m7adad o i tstocka f variable $user bach mn b3d n9dr nkhdmo b7al haka $user->name;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        $response = [];
        $response['name'] = $user->name;
        $response['email'] = $user->email;

        return response()->json([
            'status' => '200 Ok',
            'message' => 'User created successfully',
            'data' => $response,
        ]);
    }


  

}