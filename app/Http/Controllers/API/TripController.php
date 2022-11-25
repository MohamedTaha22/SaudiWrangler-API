<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return  $trips;
    }

    public function show($id)
    {
        $trip = Trip::find($id);
        return $trip;
    }

    public function store( $request)
    {
        $data = request()->all();
        $trip = new Trip();
        $trip->name = $data['name'];
        $trip->date = $data['date'];
        $trip->time = $data['time'];
        $trip->save();
        return new $trip;
    }

    public function destroy($id)
    {
        $deletedPost=Trip::find($id);
        $deletedPost->delete();
        return 'done';
    }

    public function update($id,$request)
    {
        $data = request()->all();

        $updatedTrip=Trip::find($id);
        $updatedTrip->name = $data['name'];
        $updatedTrip->date = $data['date'];
        $updatedTrip->time = $data['time'];

        $updatedTrip->save();
        return $updatedTrip;
    }
}
