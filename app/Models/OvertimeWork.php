<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvertimeWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_id', 'nik', 'name', 'department', 'position', 'complete', 'overtime_date', 'o_date', 'o_start_date', 'o_start_date_to', 'o_reason', 'user_created', 'status'
    ];
}
