<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSafetyAnalysis extends Model
{
    use HasFactory;
    protected $table = 'job_safety_analyses';
    protected $guarded = ['id'];
    protected $fillable = [
        'ref_id','kode', 'job_title', 'team_work', 'work_location', 'number_personal_working', 'every_one_capable_to_work', 'potensi_tumpahan', 'work_case', 'id_aar', 'ppe', 'user_created', 'status',
    ];
}
