<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();

        return  $memberships;
    }

    public function show($id)
    {
        $membership = Membership::find($id);
        return $membership;
    }

}
