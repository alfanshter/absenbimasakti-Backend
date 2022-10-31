<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AarJobSafety extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'date', 'sequence_of_job_step', 'potential_hazard', 'reduce_potential', 'pic', 'kode'
    ];

    public function grup()
    {
        return $this->belongsTo(User::class, 'grup_id', 'id');
    }
}
