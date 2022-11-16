<?php

namespace App\Http\Controllers;
use App\Models\InternalPurchaseRequesition;
use App\Models\DetailInternalPurchaseRequesition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Exports\InternalExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use PDF;


class InternalController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){
            Cookie::forget('kode_detail');
            $token_key = Str::random(30);
            Cookie::queue(Cookie::forever('kode_detail', $token_key));
            return view('internal.index', [
                'internal' => InternalPurchaseRequesition::all()
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function create(Request $request) 
    {
        if(Auth::check()){
            $val = Cookie::get('kode_detail');
            $data = DetailInternalPurchaseRequesition::where('kode', $val)->get();
            if ($request->ajax()) {
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'usergroup.action')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('internal.create',[
                'kode' => $val
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function storeDetail(Request $request)
    {
        if(Auth::check()){
            $detail = DetailInternalPurchaseRequesition::updateOrCreate([
                'id' => $request->id
            ],
            [
            "quantity" => $request->quantity,
            "catalog" => $request->catalog,
            "description" => $request->description,
            "size" => $request->size,
            "unit_price" => $request->unit_price,
            "amount"=> $request->amount,
            "kode" =>$request->kode
            ]);            
            return response()->json($detail);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updateDetail(Request $request)
    {
        if(Auth::check()){
            $where = array('id' => $request->id);
            $company  = DetailInternalPurchaseRequesition::where($where)->first();
        
            return Response()->json($company);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroyDetail(Request $request)
    {
        if(Auth::check()){
            $post = DetailInternalPurchaseRequesition::where('id', $request->id)->first();
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
                'requestioned_by' => 'required|max:255',
                'date' => 'required',
                'department' => 'required|max:255',
                'position' => 'required|max:255',
                'project_location' => 'required|max:255',
                'completed_address' => 'required|max:255',
            ]);
            $datadetail = DB::table('detail_internal_purchase_requesitions')->select('id')->where('kode', $request->kode)->get();
            $json = json_decode($datadetail, true);
            $output = implode(',', collect($json)->map(fn($item) => $item['id'])->all());
            InternalPurchaseRequesition::create([
                'ref_id' => $request->ref_id,
                'requestioned_by' => $request->requestioned_by,
                'date' => $request->date,
                'department' => $request->department,
                'position' => $request->position,
                'project_location' => $request->project_location,
                'completed_addres' => $request->completed_address,
                'id_detail' => $output,
                'kode' => $request->kode,
                'user_created' => auth()->user()->name,
                'status' => '1'
            ]);
            Cookie::forget('kode_detail');
            return redirect('/internal-purchase-requestion')->with('success', 'Internal Purchase Requestion Created');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit($id)
    {
        if(Auth::check()){
            $internal = InternalPurchaseRequesition::where('id' , $id)->first();
            $id_detail = explode(',' , $internal->id_detail);
            $detail = DetailInternalPurchaseRequesition::where('kode', $internal->kode)->get();
            return view('internal.edit', [
                'internal' => $internal,
                'detail' => $detail
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function update(Request $request)
    {
        if(Auth::check()){
            $user = InternalPurchaseRequesition::where('id', $request->id)->update([
                'ref_id' => $request->ref_id,
                'requestioned_by' => $request->requestioned_by,
                'date' => $request->date,
                'department' => $request->department,
                'position' => $request->position,
                'project_location' => $request->project_location,
                'completed_addres' => $request->completed_address,
                'user_created' => auth()->user()->name,
                'status' => '1'
            ]);

            return redirect('/internal-purchase-requestion')->with('success', 'Internal Purchase Requestion Updated');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $internal = InternalPurchaseRequesition::where('id' , $id)->first();
            $id_detail = explode(',' , $internal->id_detail);
            $aar = DetailInternalPurchaseRequesition::whereIn('id', $id_detail)->delete();
            InternalPurchaseRequesition::destroy($id);
            return redirect('/internal-purchase-requestion')->with('success', 'Internal Purchase Requestion Deleted');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    
    }

    public function editAddDetail(Request $request)
    {
        $detail = DetailInternalPurchaseRequesition::create([
            "quantity" => $request->quantity,
            "catalog" => $request->catalog,
            "description" => $request->description,
            "size" => $request->size,
            "unit_price" => $request->unit_price,
            "amount"=> $request->amount,
            "kode" =>$request->kode
        ]);           
        return redirect()->back()->withInput();
    }

    public function editupdatedetail(Request $request)
    {
        if(Auth::check()){
            $company  = DetailInternalPurchaseRequesition::where('id',$request->editid)->update([
                "quantity" => $request->editquantity,
                "catalog" => $request->editcatalog,
                "description" => $request->editdescription,
                "size" => $request->editsize,
                "unit_price" => $request->editunit_price,
                "amount"=> $request->editamount,
                "kode" =>$request->editkode
            ]);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editdestroydetail($id)
    {
        if(Auth::check()){
            DetailInternalPurchaseRequesition::destroy($id);
            return redirect()->back()->withInput();
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function export($id)
    {
        $internal = InternalPurchaseRequesition::find($id);
        $detail = DetailInternalPurchaseRequesition::where('kode', $internal->kode)->get();

        $paper = array(0, 0, 794, 1247);
        $pdf = PDF::loadView('internal.export',[
            'internal' =>$internal,
            'detail' => $detail,
        ])->setPaper($paper);
        return $pdf->download('Internal-Purchase-Requestion.pdf');
    }

    public function exportExcel() 
    {
        return Excel::download(new InternalExport, 'Internal-Purchase-Requestion.xlsx');
    }
}
