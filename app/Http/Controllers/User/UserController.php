<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function uploadImage(mixed $file): string
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/user/', $imageName);
        return $imageName;
    }

    public function index()
    {
        return view('dashboard.user.index');
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'image'     => 'image',
            'password'  => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $imageName      = $request->hasFile('image') ? $this->uploadImage($request->file('image'))
            : null;

        $user = new User();
        $user->firstname     = $request->input('firstname');
        $user->lastname      = $request->input('lastname') ?? null;
        $user->email         = $request->input('email');
        $user->password      = ($request->password);
        $user->image         = $imageName ?? null;
        $user->review        = $request->input('review') ?? null;
        $user->save();

        Auth::guard('web')->login($user);

        return redirect()->route('user.index')->with('success', 'You are now registered successfully');
    }

    // public function check(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email'    => 'required|email|exists:users,email',
    //         'password' => 'required|min:5|max:30'
    //     ], [
    //         'email.exists' => 'This email is not exists on user table'
    //     ]);

    //     return   Auth::guard('web')->attempt($request->only('email', 'password'))
    //         ? redirect()->route('user.index')->with('success', 'you are logged in')
    //         : redirect()->route('user.login')->with('fail', 'Incorrect credentials');
    // }

    public function check(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email does not exist in the user table'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.index')->with('success', 'You are logged in');
        }

        return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
    }


    public function logout()
    {
        Auth::logout();
        return back();
    }
}
