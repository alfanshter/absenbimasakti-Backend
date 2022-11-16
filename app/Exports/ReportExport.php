<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($group_id, $start, $end) {
            $this->group_id = $group_id;
            $this->start    = $start;
            $this->end      = $end;
    }
 
    public function view(): View
    {
        if ($this->start !=null  &&$this->end !=null  && $this->group_id !=null) {
        
            $data = Report::join('users', 'users.id', '=', 'reports.id_user')
            ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
            ->select('reports.*', 'users.name', 'groupusers.nama_grup')
            ->where('users.grup_id', '=', $this->group_id)
            ->whereBetween('date', [$this->start ,$this->end])
            ->get();

        }else if ($this->start !=null &&$this->end!=null  ) {
            $data = Report::join('users', 'users.id', '=', 'reports.id_user')
            ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
            ->select('reports.*', 'users.name', 'groupusers.nama_grup')
            ->whereBetween('date', [$this->start ,$this->end])
            ->get();

        }else{

            $data = Report::join('users', 'users.id', '=', 'reports.id_user')
            ->join('groupusers', 'groupusers.id', '=', 'users.grup_id')
            ->select('reports.*', 'users.name', 'groupusers.nama_grup')
            ->get();

        }
        return view('attendence.excel', [
            'attendence' => $data
        ]);
    }
}
