<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use App\DataTables\UserGroupDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class UserGroupController extends Controller
{

    // public function index(UserGroupDataTable $usergroupdatatable)
    // {
    //     return $usergroupdatatable->render('usergroup.index');
    //     // return view('usergroup.index');
    // }

    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($request->ajax()) {
                $data = UserGroup::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'usergroup.action')
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('usergroup.index');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $grup = UserGroup::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'nama_grup' => $request->nama_grup,
                    'user_created' => "kdjfkdjf",
                    'user_updated' => "gdhewhdj"
                ]
            );
            return response()->json($grup);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit(Request $request)
    {
        if (Auth::check()) {
            $where = array('id' => $request->id);
            $company  = UserGroup::where($where)->first();

            return Response()->json($company);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $post = UserGroup::where('id', $request->id)->first();
            if ($post) {
                $post->delete();
                return response()->json($post);
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function create_group(Request $request)
    {
        $grup = UserGroup::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nama_grup' => $request->nama_grup,
                'user_created' => "kdjfkdjf",
                'user_updated' => "gdhewhdj"
            ]
        );
        return response()->json($grup);
    }
}
