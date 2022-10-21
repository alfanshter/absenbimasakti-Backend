<?php

namespace App\Http\Controllers;
use App\Models\Tes;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        return view('tes.create');
    }
    public function store(Request $request)
    {
        $data  = [
            "date" => $request->date,
            "sequence_of_job_step" => $request->sequence_of_job_step,
            "potential_hazard"=> $request->potential_hazard,
            "reduce_potential"=> $request->reduce_potential,
            "pic"=> $request->pic
        ];
        $aar = \array_merge($data);
        session(['aar' => "dfcdfc"]);
        
        return redirect('/tes')->with('success', 'Overtime Work Created');

    }

}
