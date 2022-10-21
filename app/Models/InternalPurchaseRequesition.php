<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalPurchaseRequesition extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_id','kode', 'requestioned_by', 'date', 'department', 'position', 'project_location', 'completed_addres', 'id_detail', 'user_created', 'status'
    ];
}
