<?php
  
namespace App\Exports;
  
use App\Models\JobSafetyAnalysis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobSafetyAnalysis::select("ref_id", "job_title", "team_work", "work_location", "user_created", "status")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Ref ID", "Job Title", "Team Work", "Work Location", "User Created", "Status"];
    }
}