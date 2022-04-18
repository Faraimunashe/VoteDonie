<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Image;
use App\Models\NationalId;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function save_details(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'natid' => 'required|string|unique:details,natid',
            'location' => 'required|numeric',
            'dob' => 'required|date',
            'address' => 'required|string'
        ]);

        $new_details = new Details();
        $new_details->user_id = Auth::user()->id;
        $new_details->firstnames = $request->firstname;
        $new_details->lastname = $request->lastname;
        $new_details->sex = $request->gender;
        $new_details->natid = $request->natid;
        $new_details->dob = $request->dob;
        $new_details->address = $request->address;
        $new_details->image = $request->location;
        $new_details->save();

        return redirect()->back()->with('success', 'user details saved successfully');
    }

    public function natid_upload(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($file = $request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/natid';
            $file->move($destinationPath, $fileName);

            $new_image = new NationalId();
            $new_image->user_id = Auth::user()->id;
            $new_image->image = $fileName;
            $new_image->save();

            return redirect()->back()->with('success', 'successfully uploaded national id!');
        }

        return redirect()->back()->with('erroe', 'failed to upload image');
    }

    public function profile()
    {
        $user = User::join('details', 'details.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('users.id', 'details.firstnames', 'details.lastname', 'details.address')
            ->first();

        return view('users.profile', [
            'user' => $user
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:jpeg,png,jpg'
        ]);

        if ($file = $request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/profiles';
            $file->move($destinationPath, $fileName);

            $oldimage = Image::where('user_id', Auth::user()->id)->first();
            if (is_null($oldimage)) {
                $new_image = new Image();
                $new_image->user_id = Auth::user()->id;
                $new_image->name = $fileName;
                $new_image->save();

                return redirect()->back()->with('success', 'successfully uploaded profile image!');
            }

            $oldimage->name = $fileName;
            $oldimage->save();

            return redirect()->back()->with('success', 'successfully uploaded profile image!');
        }

        return redirect()->back()->with('error', 'failed to upload profile image');
    }
}
