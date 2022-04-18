<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Twilio\Rest\Client;

class PhoneController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'phone' => 'string|required|min:13|max:13'
        ]);

        //rand number
        function generateRandomString($length = 4)
        {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $code = generateRandomString();
        $phone = User::where('id', Auth::user()->id)->first();

        if (User::where('code', $code)->first() != null) {
            //regenerate code
            $code = generateRandomString();
        }



        try {

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($request->phone, [
                'from' => $twilio_number,
                'body' => 'Your VoteSys auth code is ' . $code . ' expires in 24hrs.'
            ]);

            $phone->phone = $request->phone;
            $phone->code = $code;
            $phone->isverified = false;
            $phone->save();

            return view('users.phone-verify', [
                'phone' => $request->phone
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'ERROR ' . $e->getMessage());
        }

        return redirect()->back()->with('error', 'ERROR could not process');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'numeric|required|min:4|max:4'
        ]);

        $phone = User::where('code', $request->code)
            ->where('id', Auth::user()->id)->first();

        if (is_null($phone)) {
            return redirect()->back()->with('error', 'your code is incorrect please use a correct one');
        }

        $phone->isverified = true;
        $phone->save();
        return route('dashboard');
    }
}
