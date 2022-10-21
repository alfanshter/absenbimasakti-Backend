<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $grup = UserGroup::all();
            $user = User::where('role', 1)->get();
            return view('dashboard.index', [
                'user' => $user->count(),
                'grup' => $grup->count()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
