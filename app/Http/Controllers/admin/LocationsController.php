<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Locations::all();
        return view('admin.locations', [
            'locations' => $locations
        ]);
    }

    public function index_add()
    {
        return view('admin.add-location');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $loc = new Locations();
        $loc->name = $request->name;
        $loc->save();

        return redirect()->back()->with('success', 'you have successfully added location');
    }
}
