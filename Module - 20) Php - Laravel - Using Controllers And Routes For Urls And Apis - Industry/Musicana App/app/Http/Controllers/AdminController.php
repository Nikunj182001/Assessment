<?php

namespace App\Http\Controllers;

use App\Mail\EmailSending;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    function admin(Request $request)
    {
        $admin = Admin::select()->where('email', '=', "$request->email")->first();
        if ($admin) {
            if ($admin->password == $request->password) {
                session()->put('adminName', $admin->name);
                return response()->json('true');
            } else {
                return response()->json('wrongp');
            }
        } else {
            return response()->json('wrongf');
        }
    }

    function logoutAdmin()
    {
        session()->pull('adminName');
        return redirect('/');
    }
    function dashboard()
    {
        return view('admin.dashboard');
    }


    function manageUser()
    {
        $user = User::all();
        return view('admin.manageUser', compact('user'));
    }

    function addUser()
    {
        return view('admin.addUser');
    }
    function storeUser(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $to = $request->email;
        $subject = "Information";
        $message = "You have registered to the Musicana App Successfully";

        Mail::to($to)->send(new EmailSending($subject, $message));



        $user->save();
        return back()->with('content', 'Added Successfully');
    }

    function DelUserPage($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('manageUser');
    }

    function manage_album()
    {
        $album = Album::all();
        return view('admin.manageAlbum', compact('album'));
    }

    function add_album()
    {
        return view('admin.addAlbum');
    }

    function editAlbumPage($id)
    {
        $album = Album::find($id);
        return view('admin.editAlbum', compact('album'));
    }

    function storeAlbum(Request $request)
    {
        $album = new Album();


        $album->artist_name = $request->artist_name;
        $album->album_name = $request->album_name;


        $album->save();

        return redirect()->route('manage_album');

    }

    function updateAlbum(Request $request, $id)
    {
        $album = Album::find($id);

        $album->artist_name = $request->artist_name;
        $album->album_name = $request->album_name;

        $album->update();
        return redirect()->route('manage_album');

    }

    function deleteAlbum($id)
    {
        $album = Album::find($id);

        // $fkid = Song::select('id')->where('album_id_fk', '=', "$album->id")->first();
        DB::table('songs')->where('album_id_fk', '=', "$album->id")->delete();
        // echo $fkid;
        // exit();
        // Song::destroy($fkid);

        $album->delete();
        return redirect()->route('manage_album');

    }



    function manage_song()
    {
        $song = Song::all();
        return view('admin.manageSong', compact('song'));
    }

    function add_song()
    {
        $artist = Album::all();
        return view('admin.addSong', compact('artist'));
    }

    function storeSong(Request $request)
    {
        $song = new Song();

        if ($request->file('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path("songs/"), $filename);
        }

        $song->artist_name_fk = $request->song;
        $song->song_name = $filename;
        $song->album_name_fk = $request->album_name;

        $song->save();

        return redirect()->route('manage_song');

    }

    function deleteSong($id)
    {
        $song = Song::find($id);


        $song->delete();
        return redirect()->route('manage_song');

    }


    function select(Request $request)
    {
        $album = Album::select('album_name')->where('artist_name', '=', "$request->select")->first();
        return response()->json($album);
    }


}
