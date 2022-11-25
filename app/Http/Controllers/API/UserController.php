<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateMembership($userId)
    {
        $user = User::find($userId);
        $data = request()->all();
        $user->membership_id = $data['membership_id'];
        $user->save();
        return $user;
    }

    public function addTrip($userId)
    {
        $user = User::find($userId);
        $data = request()->all();
        $user->trip()->attach($data['trip_id']);
        return $user;
    }

    public function removeTrip($userId)
    {
        $user = User::find($userId);
        $data = request()->all();
        $user->trip()->detach($data['trip_id']);
        return $user;
    }
}
