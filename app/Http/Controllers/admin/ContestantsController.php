<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ballots;
use App\Models\Locations;
use App\Models\Parties;
use App\Models\User;
use Illuminate\Http\Request;

class ContestantsController extends Controller
{
    public function index()
    {
        $contestants = Ballots::join('details', 'ballots.user_id', '=', 'details.user_id')
            ->join('parties', 'ballots.party_id', '=', 'parties.id')
            ->join('locations', 'ballots.location_id', '=', 'locations.id')
            ->select('ballots.id', 'ballots.type', 'details.firstnames', 'details.lastname', 'details.sex', 'parties.name', 'locations.name as lnam')
            ->get();



        return view('admin.contestants', [
            'contestants' => $contestants
        ]);
    }

    public function edit($id)
    {
        $contestants = Ballots::join('details', 'ballots.user_id', '=', 'details.user_id')
            ->join('parties', 'ballots.party_id', '=', 'parties.id')
            ->join('locations', 'ballots.location_id', '=', 'locations.id')
            ->where('ballots.id', $id)
            ->select('ballots.id', 'ballots.type', 'details.firstnames', 'details.lastname', 'details.sex', 'parties.name', 'locations.name as lnam')
            ->first();

        return view('admin.edit-contestant', [
            'con' => $contestants,
            'locations' => Locations::all(),
            'parties' => Parties::all()
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'ballot_id' => 'numeric|required',
            'location' => 'numeric|required',
            'party' => 'numeric|required'
        ]);

        $ballot = Ballots::where('id', $request->ballot_id)->first();
        $ballot->location_id = $request->location;
        $ballot->party_id = $request->party;
        $ballot->save();

        return redirect()->back()->with('success', 'successfully updated contestant');
    }

    public function delete($id)
    {
        $ballot = Ballots::find($id);
        $ballot->delete();

        return redirect()->back();
    }

    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'numeric|required',
            'type' => 'string|required',
            'location_id' => 'numeric|required',
            'party_id' => 'numeric|required'
        ]);

        $ballot = Ballots::where('user_id', $request->user_id)->first();
        if (is_null($ballot)) {
            $new_ballot = new Ballots();

            $new_ballot->user_id = $request->user_id;
            $new_ballot->type = $request->type;
            $new_ballot->location_id = $request->location_id;
            $new_ballot->party_id = $request->party_id;
            $new_ballot->save();

            return redirect()->back()->with('success', 'you have successfully added a new contestant');
        }

        return redirect()->back()->with('error', 'error! user already a contestant');
    }

    public function add_view()
    {
        return view('admin.add-contestant', [
            'users' => User::all(),
            'locations' => Locations::all(),
            'parties' => Parties::all()
        ]);
    }
}
