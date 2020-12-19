<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Users;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       $user = new Users();
       $user->firstname = $request->input('firstname');
       $user->lastname = $request->input('lastname');
       $user->email = $request->input('email');
       $user->password = $request->input('password');
       $user->phone = $request->input('phone');
       $user->save();

       return redirect('/');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
