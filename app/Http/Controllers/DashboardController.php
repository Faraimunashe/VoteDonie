<?php

namespace App\Http\Controllers;

use App\Models\Ballots;
use App\Models\Details;
use App\Models\NationalId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //check user type
        if (Auth::user()->hasRole('user')) {
            $user_data = Details::where('user_id', Auth::user()->id)->first();
            if (is_null($user_data)) {
                return view('users.details-add');
            }

            $user_natid = NationalId::where('user_id', Auth::user()->id)->first();
            if (is_null($user_natid)) {
                return view('users.natid');
            }
            $check_location = Details::where('user_id', Auth::user()->id)->first();

            $pballots = Ballots::join('details', 'details.user_id', '=', 'ballots.user_id')
                ->where('type', 'pres')
                ->get();
            $mballots = Ballots::join('details', 'details.user_id', '=', 'ballots.user_id')
                ->join('locations', 'locations.id', '=', 'ballots.location_id')
                ->where('ballots.type', 'mp')
                ->where('ballots.location_id', $check_location->image)
                ->get();
            return view('users.vote-page', [
                'pballots' => $pballots,
                'mballots' => $mballots
            ]);
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        }
    }
}
