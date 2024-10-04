<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        return $this->user->all();
    }

   


    public function show($id)
    {
        return $this->user->find($id);
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->find($id);
        return $user->update($request->all());
    }

    
    public function destroy($id)
    {
        $user = $this->user->find($id);
        return $user->delete();
    }

    function login(Request $request)
    {
        $std = $request->email;
        $res = $this->user->select()->where("email","=",$std)->first();
        
        if($res)
        {
            if($res->password == $request->password)
            {
                return response()->json("Login Success");
            }
            else
            {
                return  response()->json("Wrong Password");
            }
        }
        else
        {
            return  response()->json("Wrong Email");
        }
        
    }
    function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        if(!$validate)
        {
            return response()->json("Error in Fields");
        }
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'c_password'=>$request->c_password
            ];
        $res = $this->user->create($data);
        if($res)
        {
            return response()->json("Data Inserted Successfully");
        }
    }
}
