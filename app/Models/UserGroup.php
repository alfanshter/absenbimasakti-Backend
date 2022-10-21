<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'groupusers';
    protected $fillable = [
        'nama_grup',
        'user_created',
        'user_update'
    ];
}
