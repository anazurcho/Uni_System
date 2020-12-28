<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->except(('_token'));
        if (Auth::attempt($credentials)) {
            return redirect()->route('my_profile');
        } else {
            abort(403);
        }
    }
    public function my_profile()
    {
        return view('user.my_profile');
    }
    public function register()
    {
        return view('user.register');
    }
    public function postRegister(Request $request)
    {
        $user = new User($request->all());
        $user->status = 'student';
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return $this->postLogin($request);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('user/index', compact('users'));
    }
    public function edit(User $user)
    {
        return view("user/edit", compact('user'));
    }
    public function update(Request $request, User $user)
    {
//        $user->update($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->status){
            $user->status = $request->status;
        }else{
            $user->status = $user->status;
        }

        $user->save();
        return redirect()->route('my_profile');
    }
    public function password_edit(User $user)
    {
        return view("user/change_password", compact('user'));
    }
    public function password_update(Request $request, User $user)
    {
        $user->password = bcrypt($request->input('password'));
//        $user->push();
        $user->save();
        return redirect()->route('my_profile');
    }
}
