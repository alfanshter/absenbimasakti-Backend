<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use DataTables;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.index', [
                'admin' => User::where('role', '=', '1')->get()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function create()
    {
        if (Auth::check()) {
            return view('admin.create');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);
            $role = "1";
            $input = $request->all();
            $admin  = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role' => '1',
                'status' => '0',
            ]);
            $token = $admin->createToken('auth_token')->plainTextToken;
            return redirect('/admin')->with('success', 'Admin Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $admin = User::findOrFail($id);
            return view('admin.edit', [
                'admin' => $admin,
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $user = User::where('id', $request->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);

            return redirect('/admin')->with('success', 'Admin Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            User::destroy($id);
            return redirect('/admin')->with('success', 'Admin Deleted ');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function profilApi(Request $request)
    {
        $data = User::where('id', $request->input('id'))->with('grup')->first();
        return response()->json($data);
    }
}
