<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\{Auth, Validator, DB};

class AccountController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Please fill all the fields.', $validator->errors(), 200);
            }
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return $this->sendError('Invalid login credentials', $credentials, 200);
            }
            $success['user'] = Auth::user();
            if(is_null($success['user']->email_verified_at)) {
                return $this->sendResponse($success, 'User not verified!');
            }
            $success['token'] =  $success['user']->createToken('MyApp')->plainTextToken;

            return $this->sendResponse($success, 'User Login successfully.');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong.', $e->getMessage(), 200);
        }
    }
}
