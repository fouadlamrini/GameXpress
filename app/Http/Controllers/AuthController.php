<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
  
    public function register(Request $request)
    {
//$request->all()kyakhd ga3 data li dkhlt o validator kay validihz 
      $validator = Validator::make($request->all(), [
            'name' => 'required',
           'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
          
            return response()->json([
                'status' => '0',
                //had fonction ktrj3 akhta2 li w93o
                'errors' => $validator->errors()
            ]);
        }
    

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
       

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        // dd($token );
    return  ["user"=> $user , "token"=>$token];


        // $response = [];
        // $response['name'] = $user->name;
        // $response['email'] = $user->email;
        // $response['token']= $token;

        // // dd($response);

        // return $response ;
        if (User::count() === 1) {
            $user->assignRole('admin');
        }


    }

    public function login(Request $request){
        $fields = $request->validate(
            [ 
            'email' => 'required|email',
             'password' => 'required',]
        );
        $user = User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password , $user->password)){
            return "the credential not correct  !!";
        }else{
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        
        }
    }
    public function logout(){
        $user = Auth::user();
        // dd($user);
        return $user->tokens()->delete();

       
    }

}