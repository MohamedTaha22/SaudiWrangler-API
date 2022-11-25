<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $auth = Auth::user();
        $user = User::with("membership")->where('id', $auth->id)->get();
        return $user;
    }

    public function updateMembership()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $data = request()->all();
        $user->membership_id = $data['membership_id'];
        $user->save();
        return $user->membership;
    }

    public function addTrip()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $data = request()->all();
        $user->trip()->attach($data['trip_id']);
        return $user->trip;
    }

    public function removeTrip()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $data = request()->all();
        $user->trip()->detach($data['trip_id']);
        return $user->trip;
    }
}
