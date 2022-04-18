<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Ballots;
use App\Models\User;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $request->validate([
            'ballotid' => 'numeric|required'
        ]);

        if (is_null(Votes::where('user_id', Auth::user()->id)
            ->where('ballot_id', $request->ballotid)
            ->first()) != null) {
            //add new vote
            $vote = new Votes();
            $vote->user_id = Auth::user()->id;
            $vote->ballot_id = $request->ballotid;
            $vote->save();

            return redirect()->back()->with('success', 'you have successfully casted a vote');
        }

        return redirect()->back()->with('error', 'you could not vote due to duplication');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'ballotid' => 'numeric|required'
        ]);

        if (is_null(Votes::where('user_id', Auth::id())
            ->where('ballot_id', $request->ballotid)
            ->first())) {
            //add new vote

            return redirect()->back()->with('error', 'you did not vote in this category');
        }

        $vote = Votes::where('user_id', Auth::user()->id)
            ->where('ballot_id', $request->ballotid)
            ->first();
        $vote->delete();

        return redirect()->back()->with('success', 'votes reset successful');
    }

    public function result()
    {
        $results = Ballots::join('details', 'details.user_id', '=', 'ballots.user_id')
            ->join('parties', 'parties.id', '=', 'ballots.party_id')
            ->where('type', 'pres')
            ->select('ballots.id', 'details.firstnames', 'details.lastname', 'parties.name')
            ->get();

        return view('users.voting-results', [
            'results' => $results
        ]);
    }
}
