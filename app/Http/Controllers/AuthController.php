<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginApi(Request $request)
    {
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $response = [
                'data' => null,
                'access_token' => null,
                'token_type' => 'Bearer',
                'status' => 0
            ];

            return response()->json($response, Response::HTTP_CREATED);
        }
        $user = User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $updatetoken = DB::table('users')->where('username', $request->username)->update(['token_id' => $token]);

        if ($user->role == "0") {
            $response = [
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'status' => 1
            ];
        } else {
            $response = [
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'status' => 2
            ];
        }

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request['username'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;
            $updatetoken = DB::table('users')->where('username', $request->username)->update(['token_id' => $token]);

            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function create_user(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        $user  = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => '0',
            'status' => '0',
            'grup_id' => $request->grup_id
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json($user);
    }
}
