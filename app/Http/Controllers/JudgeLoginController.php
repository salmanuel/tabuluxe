<?php

namespace App\Http\Controllers;

use App\Models\Judge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JudgeLoginController extends Controller
{
    public function index () {
        return inertia('Auth/JudgeLogin');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'password' => 'required|string',
    //     ]);

    //     $password = $request->input('password');
    //     $judge = User::where('password', $password)->first();

    //     if (!$judge) {
    //         return redirect()->route('judgelogin')->with('error', 'Invalid password');
    //     }

    //     session(['judge_id' => $judge->id]);

    //     return redirect()->route('judging'); // Replace with your intended success route
    // }


    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $password = $request->input('password');
        $judge = User::where('password', $request->password)->first();

        $login = auth()->attempt([
            'password' => $request->password
        ]);

        $credentials = $request->only('password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->route('judging');
        }

        return redirect()->route('judgelogin')->with('error', 'Invalid password');
    }

}
