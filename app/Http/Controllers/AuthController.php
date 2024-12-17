<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function __construct()
    {
        $this->employee = new Employee();
    }

    public function getTokenCSRF()
    {
        return response()->json(['token' => csrf_token()]);
    }

    public function auth(Request $request)
    {
        // validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ]);
        // check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // check if email and password is correct
        $email = $request->input('email');
        $password = $request->input('password');
        $auth = $this->employee->auth($email, md5($password));
        if (!$auth) {
            return response()->json(['error' => 'Email or password is incorrect'], 400);
        }

        // set session
        Session::put('id', $auth->id);
        Session::put('email', $auth->email);
        Session::put('name', $auth->name);

        return response()->json(['message' => 'Login successful']);
    }

    public function logout()
    {
        Session::flush();
        return response()->json(['message' => 'Logout successful']);
    }
}
