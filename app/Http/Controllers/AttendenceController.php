<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\UserGroup;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;


class AttendenceController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $report = DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.id_user')
            ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
            ->select('reports.*', 'users.name', 'groupusers.nama_grup')->paginate(10);

            $grup_id = null;
            $starts_at = null;
            $ends_at = null;

            $data = [
                'attendence' => $report,
                'grup' => UserGroup::all(),
                'grup_id' => $grup_id,
                'starts_at' => $starts_at,
                'ends_at' => $ends_at
            ];

            return view('attendence.index', $data);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function filter(Request $request)
    {        
        $starts_at = $_GET['starts_at'];
        $ends_at =   $_GET['ends_at'];
        $grup_id =   $_GET['grup_id'];

        if($grup_id!=""){
            $report = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.id_user')
                ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
                ->where('groupusers.id',$grup_id)
                ->whereBetween('date', [$starts_at, $ends_at])
                ->select('reports.*', 'users.name', 'groupusers.*')
                ->paginate(10);
        }else{
            $report = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.id_user')
                ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
                ->whereBetween('date', [$starts_at, $ends_at])
                ->select('reports.*', 'users.name', 'groupusers.*')
                ->paginate(10);
        }

        return view('attendence.index', [
            'attendence' => $report,
            'grup' => UserGroup::all(),
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'grup_id' => $grup_id,

        ]);
    }



    public function checkin(Request $request)
    {

        //cek absen apakah ada 
        $cekabsen = Report::where('id_user', $request->id_user)->where('date', date('Y-m-d', time()))->first();
        if ($cekabsen != null) {
            $response = [
                'message' => 'success',
                'sukses' => 0,
                'data' => null
            ];

            return response()->json($response, Response::HTTP_CREATED);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();

        if ($request->file('picture_in')) {
            //compress foto 
            $foto = $request->file('picture_in');
            $fotoName = time() . '.' . $foto->extension();

            // open an image file
            $img = Image::make($foto->path());

            // prevent possible upsizing
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // finally we save the image as a new file
            $destinationPath = public_path('/storage/foto/' . $fotoName);
            $data['picture_in'] = 'foto/' . $fotoName;
            $img->save($destinationPath);


            // $data['picture_in'] = $request->file('picture_in')->store('foto', 'public');
        }

        date_default_timezone_set('Asia/Jakarta');
        $hari = date('Y-m-d', time());

        $data['date'] = date(now());
        $data['check_in'] = date(now());
        $user = Report::create($data);

        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function checkout(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_user' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //cek absen apakah ada 
        $cekabsen = Report::where('id_user', $request->id_user)->where('date', date('Y-m-d', time()))
            ->first();
        if ($cekabsen != null) {
            if ($cekabsen->check_out != null) {
                //sudah absen
                $response = [
                    'message' => 'success',
                    'sukses' => 2,
                    'data' => null
                ];

                return response()->json($response, Response::HTTP_CREATED);
            } else {

                $data = $request->all();

                if ($request->file('picture_out')) {
                    //compress foto 
                    $foto = $request->file('picture_out');
                    $fotoName = time() . '.' . $foto->extension();

                    // open an image file
                    $img = Image::make($foto->path());

                    // prevent possible upsizing
                    $img->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    // finally we save the image as a new file
                    $destinationPath = public_path('/storage/foto/' . $fotoName);
                    $data['picture_out'] = 'foto/' . $fotoName;
                    $img->save($destinationPath);

                    // $data['picture_out'] = $request->file('picture_out')->store('foto', 'public');
                }

                date_default_timezone_set('Asia/Jakarta');
                $hari = date('Y-m-d', time());

                $data['check_out'] = date(now());
                $user = Report::where('id', $cekabsen->id)->update($data);

                $response = [
                    'message' => 'success',
                    'sukses' => 1,
                    'data' => $data
                ];

                return response()->json($response, Response::HTTP_CREATED);
            }
        } else {
            //belum absen masuk
            $response = [
                'message' => 'success',
                'sukses' => 0,
                'data' => null
            ];

            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function attendenceApi(Request $request)
    {
        $data = Report::where('id_user', $request->input('id_user'))->get();
        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function print_attendence(Request $request)
    {
        $name = 'attendence'.date('Ymd').'.pdf';

        if ($request->starts_at != null && $request->ends_at!= null && $request->grup_id!=null) {
            $report = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.id_user')
                ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
                ->select('reports.*', 'users.name', 'groupusers.nama_grup')
                ->where('users.grup_id', '=', $request->grup_id)
                ->whereBetween('date', [$request->starts_at,$request->ends_at])
                ->get();

            $pdf = Pdf::loadview('attendence.print', [
                'attendence' => $report,
                'starts_at' => $request->starts_at,
                'ends_at' => $request->ends_at
            ]);
            $pdf->setPaper('A4', 'potrait');
            // return $pdf->download($name);
            return $pdf->stream();
        } else if ($request->starts_at!=null && $request->ends_at!=null) {
            $report = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.id_user')
                ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
                ->select('reports.*', 'users.name', 'groupusers.nama_grup')
                ->whereBetween('date', [$request->starts_at,$request->ends_at])
                ->get();

            $pdf = Pdf::loadview('attendence.print', [
                'attendence' => $report,
                'starts_at' => $request->starts_at,
                'ends_at' => $request->ends_at
            ]);
            $pdf->setPaper('A4', 'potrait');
            // return $pdf->download($name);
            return $pdf->stream();
        } else {
            $report = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.id_user')
                ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
                ->select('reports.*', 'users.name', 'groupusers.nama_grup')
                ->get();

            $pdf = Pdf::loadview('attendence.print', [
                'attendence' => $report,
                'starts_at' => null,
                'ends_at' => null

            ]);
            $pdf->setPaper('A4', 'potrait');
            // return $pdf->download($name);
            return $pdf->stream();
        }
    }

    public function export(Request $request)
    {
        $name = 'attendence'.date('Ymd').'.xlsx';
        return (new ReportExport($request->grup_id,$request->starts_at,$request->ends_at))->download($name);


    }
}
