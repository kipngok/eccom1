<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;

class AuthController extends Controller
{
   // 'name','is_admin','email','phone','role_id','affiliateCode','password',

    public function register( Request $request)
    {

      $input = $request->all(); 
         $validator = Validator::make($input, [
           'name'=>'required',
           'email'=>'required| unique:users',
           'password'=>'required'
              ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors()]);
         }

         $input['password']=Hash::make($input['password']);
         $user=User::create($input);
         $accessToken = $user->createToken('authToken')->accessToken;
         return response([ 'user' => $user, 'access_token' => $accessToken]);

    }
    public function login()
    {
       

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => auth()->user(), 'access_token' => $accessToken, 'success' => true,]);
        } else {
       //if authentication is unsuccessfull, notice how I return json parameters
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
    }
      public function logout(Request $res)
    {
      if (Auth::user()) {
        $tokens = Auth::user()->tokens();
        $tokens->delete();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     }


   
}
