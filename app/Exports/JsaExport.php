<?php

namespace App\Exports;

use App\Models\JobSafetyAnalysis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JsaExport implements FromView
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return view('job.excel', [
            'data' => JobSafetyAnalysis::all()
        ]);
    }

    public function view(): View
    {
        return view('job.excel', [
            'data' => JobSafetyAnalysis::all()
        ]);
    }
}
