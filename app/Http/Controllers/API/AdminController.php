<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userIndex()
    {
        $users= User::with("membership")->get();
        return $users;
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->role = 'admin';
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User is admin now'
        ], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }
}
