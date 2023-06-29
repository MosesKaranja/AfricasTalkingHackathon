<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //Read all users
    public function read()
    {
        $users = User::all();

        if (count($users) > 0) {
            return response()->json(["status" => "success", "message" => "Users attached in user object", "users" => $users]);
        } else {
            return response()->json(["status" => "success", "message" => "No users saved yet", "users" => $users]);
        }
    }

    public function returnSpecificUser(Request $request)
    {

        $request->validate([
            'user_id' => 'required',

        ]);

        $users = User::where('user_id', $request->user_id)->get();

        if (count($users) > 0) {
            return response()->json(["status" => "success", "message" => "user attached in user object", "users" => $users]);

        } else {
            return response()->json(["status" => "success", "message" => "No user with id ".$request->user_id." found"]);

        }
       
    }

    //create read update delete
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'required|confirmed',
        ]);


        $user = new User();

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone_number = $request['phone_number'];
        $user->password = $request['password'];

        if ($user->save()) {
            return response()->json(["status" => "success", "message" => "User Created"]);
        } else {
            return response()->json(["status" => "error", "message" => "User Failed to Create"]);
        }
    }


    //update a user
    public function updateUser(Request $request)
    {
       $request->validate([
            'user_id' => 'required',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone_number' => 'required|string',

        ]);

        $user = User::where('id', $request->user_id)->first();

        if($user){
            $user = new User();
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->phone_number = $request['phone_number'];

            if($user->save()){
                return response()->json(["status" => "success", "message" => "User Updated Successfully", "user" => $user]);

            }
            else{
                return response()->json(["status" => "error", "message" => "User Failed to Update"]);

            }

        }
        else{
            return response()->json(["status" => "success", "message" => "No User with id ". $request->user_id. " found"]);

        }

    }

    public function deleteUser(Request $request)
    {
       $request->validate([
            'user_id' => 'required',

        ]);

        $user = User::where('id', $request->user_id)->first();

        if($user){

            if($user->delete()){
                return response()->json(["status" => "success", "message" => "User Deleted Successfully", "user" => $user]);

            }
            else{
                return response()->json(["status" => "error", "message" => "User Failed to Delete"]);

            }

        }
        else{
            return response()->json(["status" => "success", "message" => "No User with id ". $request->user_id. " found"]);

        }

    }
}
