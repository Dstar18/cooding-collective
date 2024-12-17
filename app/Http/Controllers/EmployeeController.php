<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    function __construct()
    {
        $this->employee = new Employee();
        $this->userAccount = new UserAccount();
    }

    public function index(Request $request)
    {
        $params['page'] = $request->input('page');
        $data = $this->employee->getList($params);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        // validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'dob' => 'required',
            'city' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            'created_at' => 'required'
        ]);
        // check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // check if email already exists
        $email = $request->input('email');
        $checkEmail = $this->employee->where('email', $email)->first();
        if ($checkEmail) {
            return response()->json(['error' => 'Email already exists'], 400);
        }

        // create employee and password hash
        $params = [
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'city' => $request->input('city'),
            'email' => $email,
            'password' => md5($request->input('password')),
            'created_at' => $request->input('created_at')
        ];
        $employeeId = $this->employee->createEmployee($params);

        // create user account
        $userAccountParams = [
            'employee_id' => $employeeId,
            'create_date' => date('Y-m-d H:i:s'),
            'status' => 'active'
        ];
        $this->userAccount->createUser($userAccountParams);
        return response()->json(['message' => 'Employee created successfully']);
    }

    public function show($id)
    {
        $data = $this->employee->getId($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        // validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'dob' => 'required',
            'city' => 'required',
            'email' => 'required|email|max:255',
            'updated_at' => 'required',
            'status' => 'required'
        ]);
        // check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // update employee
        $employeeParams = [
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'updated_at' => $request->input('updated_at')
        ];
        $this->employee->updateEmployee($employeeParams, $id);

        // update user account
        $userAccountParams = [
            'status' => $request->input('status')
        ];
        $employeeId = $id;
        $this->userAccount->updateUser($userAccountParams, $employeeId);
        return response()->json(['message' => 'Employee updated successfully']);
    }
}
