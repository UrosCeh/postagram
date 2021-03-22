<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('users.auth.password_change');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'confirmed'],
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('home')->with('alert', 'Password changed successfully!');
    }
}
