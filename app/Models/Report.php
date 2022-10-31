<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id_user', 'date', 'check_in', 'picture_in', 'check_out', 'picture_out'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
