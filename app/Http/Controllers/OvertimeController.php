<?php

namespace App\Http\Controllers;
use App\Models\OvertimeWork;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Exports\OvertimeExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DataTables;

class OvertimeController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){
            return view('overtime.index', [
                'overtime' => OvertimeWork::all()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function create() 
    {
        if(Auth::check()){
            return view('overtime.create');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
        
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            $validatedData = $request->validate([
                'ref_id' => 'required|max:255',
                'nik' => 'required|max:255',
                'name' => 'required|max:255',
                'department' => 'required|max:255',
                'position' => 'required|max:255',
                'complete' => 'required|max:255',
                'o_date' => 'required|max:255',
                'o_reason' => 'required|max:255',
            ]);
            OvertimeWork::create([
                'ref_id' => $request->ref_id,
                'nik' => $request->nik,
                'name' => $request->name,
                'department' => $request->department,
                'position' => $request->position,
                'complete' => $request->complete,
                'o_date' => $request->o_date,
                'o_start_date' => $request->o_start_date,
                'o_start_date_to' => $request->o_start_date_to,
                'o_reason' => $request->o_reason,
                'user_created' => 'aku',
                'status' => '1'
            ]);
            return redirect('/overtime-work')->with('success', 'Overtime Work Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function edit($id)
    {
        if(Auth::check()){
            $overtime = OvertimeWork::findOrFail($id);
            return view('overtime.edit', [
                'overtime' => $overtime,
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function update(Request $request)
    {
        if(Auth::check()){
            $user = OvertimeWork::where('id', $request->id)->update([
                'ref_id' => $request->ref_id,
                'nik' => $request->nik,
                'name' => $request->name,
                'department' => $request->department,
                'position' => $request->position,
                'complete' => $request->complete,
                'o_date' => $request->o_date,
                'o_start_date' => $request->o_start_date,
                'o_start_date_to' => $request->o_start_date_to,
                'o_reason' => $request->o_reason,
            ]);

            return redirect('/overtime-work')->with('success', 'Overtime Work Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy($id)
    {
        if(Auth::check()){
            OvertimeWork::destroy($id);
            return redirect('/overtime-work')->with('success', 'Overtime Work Deleted ');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function export($id)
    {
        $overtime = OvertimeWork::find($id);
        $paper = array(0, 0, 794, 1247);

        $pdf = PDF::loadView('overtime.export',['overtime' =>$overtime])->setPaper($paper);
        return $pdf->download('Overtime-Work.pdf');
    }

    public function exportExcel() 
    {
        return Excel::download(new OvertimeExport, 'Overtime-Work.xlsx');
    }
}
