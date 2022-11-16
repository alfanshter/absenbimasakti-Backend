<?php
  
namespace App\Exports;
  
use App\Models\OvertimeWork;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OvertimeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OvertimeWork::select('ref_id', 'nik', 'name', 'department', 'position', 'complete', 'o_date', 'o_start_date', 'user_created', 'status')->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Ref ID", "NIK", "Name", "Department","Position","Complete Task", "Overtime Date", "Starting At", "User Created", "Status"];
    }
}