<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Controllers\BaseController as BaseController;

use App\User;
use App\Account;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'c_password'=> 'required|same:password',
            'firstname' => 'required',
            'contact'   => 'required',  
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // $input = $request->all();
        // $input['password'] = bcrypt($input['password']);
        // $user = User::create($input);

        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->contact = $request->input('contact');
        $user->role_id = 1;
        $user->save();

        $account = new Account;
        $account->username = $request->input('username');
        $account->email = $request->input('email');
        $account->password = bcrypt($request->input('password'));
        $account->user_id = $user->id;
        $account->save();


        $success['username'] = $account->username;
        $success['token'] =  $account->createToken('Breakpoin Appliction')->accessToken;    

        return $this->sendResponse($success, 'User register successfulll.');
    }

    public function login(Request $request) 
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('Breakpoin Appliction')->accessToken;
            $success['username'] = $user->username;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
