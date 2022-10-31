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

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('user.index', [
                'user' => Db::table('users')->join('groupusers', 'groupusers.id', '=', 'users.grup_id')->select('users.*', 'groupusers.nama_grup')->get()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function create()
    {
        if (Auth::check()) {
            return view('user.create', [
                'grup' => UserGroup::all()
            ]);
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
            $user  = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role' => '1',
                'status' => '0',
                'grup_id' => $request->grup_id
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            return redirect('/user')->with('success', 'User Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $user = User::findOrFail($id);
            return view('user.edit', [
                'user' => $user,
                'grup' => UserGroup::all()
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
                'grup_id' => $request->grup_id
            ]);

            return redirect('/user')->with('success', 'User Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            User::destroy($id);
            return redirect('/user')->with('success', 'User Deleted ');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function profilApi(Request $request)
    {
        $data = User::where('id', $request->input('id'))->with('grup')->first();
        return response()->json($data);
    }
}
