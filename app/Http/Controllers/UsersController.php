<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginPage()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     */
    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8|string'
        ]);
        $user = Users::where('email', $data['email'])->first();
        if (Hash::check($data['password'], $user->password)) {
            session()->put('user_id', $user->id);
            session()->put('email', $user->email);
            session()->put('name', $user->name);
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['password' => 'Password Anda Salah']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        //
    }
}
