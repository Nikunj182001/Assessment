<?php

namespace App\Http\Controllers;

use App\Mail\EmailSending;
use App\Models\Admin;
use App\Models\Album;
use App\Models\FavSong;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    function user(Request $request)
    {
        $admin = User::select()->where('email', '=', "$request->email")->first();
        if ($admin) {
            if ($admin->password == $request->password) {
                session()->put('name', $admin->name);
                session()->put('userEmail', $admin->email);

                $to = $admin->email;
                $subject = "Information";
                $message = "You have Logged in to the Musicana App Successfully";

                // Mail::to($to)->send(new EmailSending($subject, $message));

                return response()->json('true');
            } else {
                return response()->json('wrongp');
            }
        } else {
            return response()->json('wrongf');
        }
    }

    function musicana()
    {
        $song = Song::all();
        return view('user.musicana', compact('song'));
    }

    function userProfile()
    {
        $user = User::where('email', '=', session()->get('userEmail'))->first();

        return view('user.editUserProfile', compact('user'));
    }

    function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        session()->put('name', $request->name);

        $user->update();
        return redirect()->route('musicana');
    }

    function album()
    {
        $album = Album::all();
        return view('user.album', compact('album'));
    }

    function song()
    {
        $user = session()->get('name');
        $song = FavSong::select()->where('user', '=', "$user")->get();

        // echo $song;
        // exit();
        return view('user.song', compact('song'));
    }

    function logoutUser()
    {
        session()->pull('name');
        session()->pull('email');

        return redirect('/');
    }

    function favSong($id)
    {
        $song = Song::find($id);

        $fav = new FavSong();

        $user = session()->get('name');

        $fav->song_name = $song->song_name;
        $fav->artist_name = $song->artist_name_fk;
        $fav->user = $user;

        $fav->save();
        return back()->with("content", "Added Successfully");
    }

    function delFavSong($id)
    {
        $song = FavSong::find($id);
        $song->delete();

        return back()->with('content', 'Success');
    }

    function otpSend(Request $request)
    {
        $rand = rand(111111, 999999);
        session()->put('otp', $rand);

        $email = $request->email;
        session()->put('email', $email);

        $to = $email;
        $subject = "OTP";
        $message = "Your OTP for Updating new Password is :- $rand";

        $mail = Mail::to($to)->send(new EmailSending($subject, $message));

        if ($mail) {
            return redirect()->route('checkOtp');
        }

    }

    function checkOtp()
    {
        return view('checkOtp');
    }

    function confirmOtp(Request $request)
    {
        if ($request->otp == session()->get('otp')) {
            session()->pull('otp');
            session()->pull('otp');
            return view('setPassword');
        } else {
            return back()->with('content', 'Wrong OTP');
        }
    }

    function changePass(Request $request)
    {
        $user = User::where('email', '=', session()->get('email'))->first();

        $user->password = $request->password;
        $user->update();

        session()->pull('email');
        return view('login');
    }
}