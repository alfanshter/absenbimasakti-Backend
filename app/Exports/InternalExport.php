<?php

namespace App\Exports;

use App\Models\InternalPurchaseRequesition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InternalExport implements FromView
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return view('internal.excel', [
            'data' => InternalPurchaseRequesition::all()
        ]);
    }

    public function view(): View
    {
        return view('job.excel', [
            'data' => InternalPurchaseRequesition::all()
        ]);
    }
}
