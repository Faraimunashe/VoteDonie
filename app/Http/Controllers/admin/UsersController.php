<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voter;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::join('details', 'details.user_id', '=', 'users.id')
            ->join('national_ids', 'national_ids.user_id', '=', 'users.id')
            ->select('users.id', 'users.email', 'details.firstnames', 'details.lastname', 'details.sex', 'details.natid', 'national_ids.image')
            ->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.edit-user', [
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function post(Request $request)
    {
        $request->validate([
            'user_id' => 'numeric|required',
            'name' => 'string|required',
            'email' => 'email|required'
        ]);

        $user = User::where('id', $request->user_id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'successfully edited user details');
    }

    public function see_id($id)
    {
        $user = User::join('details', 'details.user_id', '=', 'users.id')
            ->join('national_ids', 'national_ids.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.id', 'users.email', 'details.firstnames', 'details.lastname', 'details.sex', 'details.natid', 'details.dob', 'national_ids.image')
            ->first();

        return view('admin.show-image', [
            'user' => $user
        ]);
    }

    public function make_voter($id)
    {
        $user = User::where('id', $id)->first();
        $voter = new Voter();
        $voter->user_id = $user->id;
        $voter->save();

        return redirect()->back()->with('success', 'successfully verified user!');
    }
}
