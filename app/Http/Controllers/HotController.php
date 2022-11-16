<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\HotWorkPermit;
use App\Models\EquipmentCheck;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Exports\HotExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DataTables;


class HotController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){
            Cookie::forget('kode_equipment');
            $token_key = Str::random(30);
            Cookie::queue(Cookie::forever('kode_equipment', $token_key));
            return view('hot.index', [
                'hot' => HotWorkPermit::all()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function create(Request $request) {
        if(Auth::check()){
            $val = Cookie::get('kode_equipment');
            $data = EquipmentCheck::where('kode', $val)->get();
            if ($request->ajax()) {
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'usergroup.action')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('hot.create',[
                'kode' => $val
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function storeEquipment(Request $request)
    {
        if(Auth::check()){
            $equipment = EquipmentCheck::updateOrCreate([
                'id' => $request->id
            ],
            [
            "equipment" => $request->equipment,
            "inspection_no" => $request->inspection_no,
            "inspected_by" => $request->inspected_by,
            "inspection_date" => $request->inspection_date,
            "kode" =>$request->kode
            ]);            
            return response()->json($equipment);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updateEquipment(Request $request)
    {
        if(Auth::check()){
            $where = array('id' => $request->id);
            $company  = EquipmentCheck::where($where)->first();
        
            return Response()->json($company);
        }
        return redirect("login")->withSuccess('You are not allowed to access');


    }

    public function destroyEquipment(Request $request)
    {
        if(Auth::check()){
            $post = EquipmentCheck::where('id', $request->id)->first();
            if($post){
                $post->delete();
                return response()->json($post);
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $validatedData = $request->validate([
                'ref_id' => 'required|max:255',
                'job' => 'required|max:255',
                'attached_ptw_no' => 'required',
                'brief_description' => 'required|max:255',
                'contractor' => 'required|max:255',
                'location' => 'required|max:255',
            ]);
            $datadetail = DB::table('equipment_checks')->select('id')->where('kode', $request->kode)->get();
            $json = json_decode($datadetail, true);
            $output = implode(',', collect($json)->map(fn($item) => $item['id'])->all());
            HotWorkPermit::create([
                'ref_id' => $request->ref_id,
                'job' => $request->job,
                'attached_ptw_no' => $request->attached_ptw_no,
                'brief_description' => $request->brief_description,
                'contractor' => $request->contractor,
                'location' => $request->location,
                'id_equipment_check' => $output,
                'fire_exs' => $request->fire_exs,
                'welding' => $request->welding,
                'wacc_flammable' => $request->wacc_flammable,
                'wacc_combustible' => $request->wacc_combustible,
                'cpp_problem_health' => $request->cpp_problem_health,
                'cpp_adequote' => $request->cpp_adequote,
                'cpp_understand_site' => $request->cpp_understand_site,
                'cpp_kextinguidsher' => $request->cpp_kextinguidsher,
                'other_precaution' => $request->other_precaution,
                'vp_form' => $request->vp_form,
                'vp_to' => $request->vp_to,
                'issuer' => $request->issuer,
                'vp_datetime' => $request->vp_datetime,
                'c_acceptor' => $request->c_acceptor,
                'c_datetime' => $request->c_datetime,
                'stop_working' => $request->stop_working,
                'stoped_by' => $request->stoped_by,
                'h_acceptor' => $request->h_acceptor,
                'h_acceptor_datetime' => $request->h_acceptor_datetime,
                'h_issuer' => $request->h_issuer,
                'h_issuer_datetime' => $request->h_issuer_datetime,
                'kode' => $request->kode,
                'user_created' => auth()->user()->name,
                'status' => '1'
            ]);
            Cookie::forget('kode_equipment');
            return redirect('/hot-work-premit')->with('success', 'Hot Work Premit Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function edit($id)
    {
        if(Auth::check()){
            $hot = HotWorkPermit::where('id' , $id)->first();
            $id_equipment = explode(',' , $hot->id_equipment_check);
            $equipment = EquipmentCheck::where('kode', $hot->kode)->get();
            return view('hot.edit', [
                'hot' => $hot,
                'equipment' => $equipment
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function update(Request $request)
    {
        if(Auth::check()){
            $user = HotWorkPermit::where('id', $request->id)->update([
                'ref_id' => $request->ref_id,
                'job' => $request->job,
                'attached_ptw_no' => $request->attached_ptw_no,
                'brief_description' => $request->brief_description,
                'contractor' => $request->contractor,
                'location' => $request->location,
                'fire_exs' => $request->fire_exs,
                'welding' => $request->welding,
                'wacc_flammable' => $request->wacc_flammable,
                'wacc_combustible' => $request->wacc_combustible,
                'cpp_problem_health' => $request->cpp_problem_health,
                'cpp_adequote' => $request->cpp_adequote,
                'cpp_understand_site' => $request->cpp_understand_site,
                'cpp_kextinguidsher' => $request->cpp_kextinguidsher,
                'other_precaution' => $request->other_precaution,
                'vp_form' => $request->vp_form,
                'vp_to' => $request->vp_to,
                'issuer' => $request->issuer,
                'vp_datetime' => $request->vp_datetime,
                'c_acceptor' => $request->c_acceptor,
                'c_datetime' => $request->c_datetime,
                'stop_working' => $request->stop_working,
                'stoped_by' => $request->stoped_by,
                'h_acceptor' => $request->h_acceptor,
                'h_acceptor_datetime' => $request->h_acceptor_datetime,
                'h_issuer' => $request->h_issuer,
                'h_issuer_datetime' => $request->h_issuer_datetime,
            ]);

            return redirect('/hot-work-premit')->with('success', 'Hot Work Premit Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editAddequipment(Request $request)
    {
        $detail = EquipmentCheck::create([
            "equipment" => $request->equipment,
            "inspection_no" => $request->inspection_no,
            "inspected_by" => $request->inspected_by,
            "inspection_date" => $request->inspection_date,
            "kode" =>$request->kode
        ]);           
        return redirect()->back()->withInput();
    }

    public function editupdateequipment(Request $request)
    {
        if(Auth::check()){
            $company  = EquipmentCheck::where('id',$request->editid)->update([
                "equipment" => $request->editequipment,
                "inspection_no" => $request->editinspection_no,
                "inspected_by" => $request->editinspected_by,
                "inspection_date" => $request->editinspection_date,
                "kode" =>$request->editkode
            ]);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editdestroyequipment($id)
    {
        if(Auth::check()){
            EquipmentCheck::destroy($id);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy($id)
    {
        $internal = HotWorkPermit::where('id' , $id)->first();
            $id_detail = explode(',' , $internal->id_equipment_check);
            $aar = EquipmentCheck::whereIn('id', $id_detail)->delete();
    }

    public function export($id)
    {
        $hot = HotWorkPermit::find($id);
        $vp_from = explode(" ", $hot->vp_form);
        $vpf_date = $vp_from[0];
        $vpf_time = $vp_from[1];
        $vp_to = explode(" ", $hot->vp_to);
        $vpt_date = $vp_to[0];
        $vpt_time = $vp_to[1];
        $vp_datetime = explode(" ", $hot->vp_datetime);
        $vpd_date = $vp_datetime[0];
        $vpd_time = $vp_datetime[1];
        $c_datetime = explode(" ", $hot->c_datetime);
        $c_date = $c_datetime[0];
        $c_time = $c_datetime[1];
        $h_acceptor_datetime = explode(" ", $hot->h_acceptor_datetime);
        $hc_date = $h_acceptor_datetime[0];
        $hc_time = $h_acceptor_datetime[1];
        $h_issuer_datetime = explode(" ", $hot->h_issuer_datetime);
        $hi_date = $h_issuer_datetime[0];
        $hi_time = $h_issuer_datetime[1];
        $equipment = EquipmentCheck::where('kode', $hot->kode)->get();

        $paper = array(0, 0, 794, 1247);
        $pdf = PDF::loadView('hot.export',[
            'hot' =>$hot,
            'equipment' => $equipment,
            'vpf_date' => $vpf_date,
            'vpf_time' => $vpf_time,
            'vpt_date' => $vpt_date,
            'vpt_time' => $vpt_time,
            'vpd_date' => $vpd_date,
            'vpd_time' => $vpd_time,
            'c_date' => $c_date,
            'c_time' => $c_time,
            'hc_date' => $hc_date,
            'hc_time' => $hc_time,
            'hi_date' => $hi_date,
            'hi_time' => $hi_time,
        ])->setPaper($paper);
        return $pdf->download('Hot-Work-Premit.pdf');
    }

    public function exportExcel() 
    {
        return Excel::download(new HotExport, 'Hot-Work-Premit.xlsx');
    }

}
