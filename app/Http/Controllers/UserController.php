<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Create and Store
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        User::create($data);

        echo "success create user";
    }

    //Edit and Update

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        $user->update($data);

        echo "success update user";
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        echo "delete success";
    }

}
