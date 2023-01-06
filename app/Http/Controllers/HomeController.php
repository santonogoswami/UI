<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


       public function store(Request $request)
    {
       $password=hash::make($request->password);
       return $password;
    }

    public function password_change()
    {
       return view('password_change');
    }

    //password Update//
    public function update_passwaord(Request $request)
    {
          // Validate the form data
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Check that the current password is correct
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
    }

    // Update the user's password
    $user->password = Hash::make($request->new_password);
    $user->save();

    // Redirect to the home page with a success message
    return redirect()->back()->with('success', 'Password changed successfully');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
