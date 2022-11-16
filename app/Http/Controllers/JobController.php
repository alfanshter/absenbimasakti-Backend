<?php

namespace App\Http\Controllers;
use App\Models\JobSafetyAnalysis;
use App\Models\AarJobSafety;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Exports\JobExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use PDF;

class JobController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){
            Cookie::forget('kode_aar');
            $token_key = Str::random(30);
            Cookie::queue(Cookie::forever('kode_aar', $token_key));
            return view('job.index', [
                'job' => JobSafetyAnalysis::all()]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function create(Request $request) 
    {
        if(Auth::check()){
            $val = Cookie::get('kode_aar');
            $data = AarJobSafety::where('kode', $val)->get();
            if ($request->ajax()) {
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'usergroup.action')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('job.create',[
                'kode' => $val
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function storeAar(Request $request)
    {
        if(Auth::check()){
            $aar = AarJobSafety::updateOrCreate([
                'id' => $request->id
            ],
            [
            "date" => $request->date,
            "sequence_of_job_step" => $request->sequence_of_job_step,
            "potential_hazard" => $request->potential_hazard,
            "reduce_potential" => $request->reduce_potential,
            "pic" => $request->pic,
            "kode" =>$request->kode
            ]);            
            return response()->json($aar);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $validatedData = $request->validate([
                'ref_id' => 'required|max:255',
                'job_title' => 'required|max:255',
                'team_work' => 'required|max:255',
                'work_location' => 'required|max:255',
                'number' => 'required|max:255',
            ]);
            $dataaar = DB::table('aar_job_safeties')->select('id')->where('kode', $request->kode)->get();
            $json = json_decode($dataaar, true);
            $output = implode(',', collect($json)->map(fn($item) => $item['id'])->all());
            JobSafetyAnalysis::create([
                'ref_id' => $request->ref_id,
                'job_title' => $request->job_title,
                'team_work' => $request->team_work,
                'work_location' => $request->work_location,
                'number_personal_working' => $request->number,
                'every_one_capable_to_work' => $request->cqfp,
                'potensi_tumpahan' => $request->cqpt,
                'work_case' => $request->cqwc,
                'id_aar' => $output,
                'ppe' => implode(',', $request->cb_ppe),
                'kode' => $request->kode,
                'user_created' => auth()->user()->name,
                'status' => '1'
            ]);
            Cookie::forget('kode_aar');
            return redirect('/job-safety-analysis')->with('success', 'Job Safety Analysis Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit($id)
    {
        if(Auth::check()){
            $job = JobSafetyAnalysis::where('id' , $id)->first();
            $id_aar = explode(',' , $job->id_aar);
            $aar = AarJobSafety::where('kode', $job->kode)->get();
            return view('job.edit', [
                'job' => $job,
                'ppe' => explode(',', $job->ppe),
                'aar' => $aar
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function update(Request $request)
    {
        if(Auth::check()){
            $dataaar = DB::table('aar_job_safeties')->select('id')->where('kode', $request->kode)->get();
                $json = json_decode($dataaar, true);
                $output = implode(',', collect($json)->map(fn($item) => $item['id'])->all());
            $user = JobSafetyAnalysis::where('id', $request->id)->update([
                'ref_id' => $request->ref_id,
                'job_title' => $request->job_title,
                'team_work' => $request->team_work,
                'work_location' => $request->work_location,
                'number_personal_working' => $request->number,
                'every_one_capable_to_work' => $request->cqfp,
                'potensi_tumpahan' => $request->cqpt,
                'work_case' => $request->cqwc,
                'ppe' => implode(',', $request->cb_ppe),
                'id_aar' => $output,
                'status' => '1'
            ]);

            return redirect('/job-safety-analysis')->with('success', 'Job Safety Analysis Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updateAar(Request $request)
    {
        if(Auth::check()){
            $where = array('id' => $request->id);
            $company  = AarJobSafety::where($where)->first();
            return Response()->json($company);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function destroy($id)
    {
        if(Auth::check()){
            $internal = JobSafetyAnalysis::where('id' , $id)->first();
            $id_detail = explode(',' , $internal->id_aar);
            $aar = AarJobSafety::whereIn('id', $id_detail)->delete();
            JobSafetyAnalysis::destroy($id);
            return redirect('/job-safety-analysis')->with('success', 'Job Safety Analysis Deleted ');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroyAar(Request $request)
    {
        if(Auth::check()){
            $post = AarJobSafety::where('id', $request->id)->first();
            if($post){
                $post->delete();
                return response()->json($post);
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editAddAar(Request $request)
    {
        AarJobSafety::create([
            "date" => $request->date,
            "sequence_of_job_step" => $request->sequence_of_job_step,
            "potential_hazard" => $request->potential_hazard,
            "reduce_potential" => $request->reduce_potential,
            "pic" => $request->pic,
            "kode" =>$request->kode
        ]);            
        return redirect()->back()->withInput();
    }

    public function editupdateAar(Request $request)
    {
        if(Auth::check()){
            $company  = AarJobSafety::where('id',$request->editid)->update([
                "date" => $request->editdate,
                "sequence_of_job_step" => $request->editsequence_of_job_step,
                "potential_hazard" => $request->editpotential_hazard,
                "reduce_potential" => $request->editreduce_potential,
                "pic" => $request->editpic,
                "kode" =>$request->editkode
            ]);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editdestroyAar($id)
    {
        if(Auth::check()){
            AarJobSafety::destroy($id);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function export($id)
    {
        $job = JobSafetyAnalysis::find($id);
        $aar = AarJobSafety::where('kode', $job->kode)->get();
        $paper = array(0, 0, 794, 1247);

        $pdf = PDF::loadView('job.export',[
            'job' => $job,
            'ppe' => explode(',', $job->ppe),
            'aar' => $aar
            ])->setPaper($paper);
        return $pdf->download('Job-Safety-Analysis.pdf');
        // return view('job.export');
    }

    public function exportExcel() 
    {
        return Excel::download(new JobExport, 'Job-Safety-Analysis.xlsx');
    }

}
