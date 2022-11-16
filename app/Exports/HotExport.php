<?php
  
namespace App\Exports;
  
use App\Models\HotWorkPermit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HotExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HotWorkPermit::select("ref_id", "job","attached_ptw_no","contractor", "location", "user_created", "status")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Ref ID", "Job", "PTW No", "Contractor","Location", "User Created", "Status"];
    }
}