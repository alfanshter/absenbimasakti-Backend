<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AttendenceController extends Controller
{
    //
    public function index(Request $request)
    {
        if (Auth::check()) {
            $filter = $request->query('filter');
            if (!empty($filter)) {
                $report = Report::whereBetween('date', [$request->starts_at, $request->ends_at])->paginate(10);;
            } else {
                $report = Report::paginate(2);
            }
            return view('attendence.index', [
                'attendence' => $report
            ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
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
            $data['picture_in'] = $request->file('picture_in')->store('foto', 'public');
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
                    $data['picture_out'] = $request->file('picture_out')->store('foto', 'public');
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
}
