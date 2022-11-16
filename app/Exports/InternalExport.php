<?php
  
namespace App\Exports;
  
use App\Models\InternalPurchaseRequesition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InternalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InternalPurchaseRequesition::select("ref_id", "date","department", "position","project_location", "completed_addres", "user_created", "status")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Ref ID", "Date", "Department", "Position","Project Location","Completed Address", "User Created", "Status"];
    }
}