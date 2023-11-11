<?php

namespace App\Http\Controllers;

use App\Models\Judge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class JudgeLoginController extends Controller
{
    public function index () {
        return inertia('Auth/JudgeLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $judge = User::where('password', $request->password)->first();

        if (!$judge) {
            return redirect()->route('judgelogin')->with('error', 'Judge not found');
        }

        $login = Auth::login($judge);

        if ($login) {
            return redirect()->route('contests.show');
        }
    }

}
