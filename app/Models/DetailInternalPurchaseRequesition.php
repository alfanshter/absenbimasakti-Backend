<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInternalPurchaseRequesition extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity', 'catalog', 'description', 'size', 'unit_price', 'amount', 'kode'
    ];
}
