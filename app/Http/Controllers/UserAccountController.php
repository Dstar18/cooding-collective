<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;

class UserAccountController extends Controller
{
    function __construct()
    {
        $this->userAccount = new UserAccount();
    }

    public function show($id)
    {
        $data = $this->userAccount->find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $params = [
            'status' => $request->input('status')
        ];
        $query = $this->userAccount->updateUser($params, $id);
        return response()->json(['message' => 'User account updated successfully']);
    }
}
