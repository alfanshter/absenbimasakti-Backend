<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotWorkPermit extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_id','kode', 'job', 'attached_ptw_no', 'brief_description', 'contractor', 'location', 'id_equipment_check', 'fire_exs', 'welding', 'wacc_flammable', 'wacc_combustible', 'cpp_problem_health', 'cpp_adequote', 'cpp_understand_site', 'cpp_kextinguidsher', 'other_precaution', 'vp_form', 'vp_to', 'issuer', 'vp_datetime', 'c_acceptor', 'c_datetime', 'stop_working', 'stoped_by', 'h_acceptor', 'h_acceptor_datetime', 'h_issuer', 'h_issuer_datetime', 'user_created', 'status'
    ];
}
