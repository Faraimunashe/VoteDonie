<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parties;
use Illuminate\Http\Request;

class PartiesController extends Controller
{
    public function index()
    {
        $parties = Parties::all();

        return view('admin.parties', [
            'parties' => $parties
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'name' => 'string|required'
        ]);

        $new_party = new Parties();
        $new_party->name = $request->name;
        $new_party->save();

        return redirect()->back()->with('success', 'successfully updated a party');
    }

    public function index_add()
    {
        return view('admin.add-party');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $party = new Parties();
        $party->name = $request->name;
        $party->save();

        return redirect()->back()->with('success', 'you have successfully added party');
    }
}
