<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCheck extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipment', 'inspection_no', 'inspected_by', 'inspection_date', 'kode'
    ];
}
