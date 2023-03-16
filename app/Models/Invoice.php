<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'freight',
        'to_country',
        'to_city',
        'to_zip',
        'to_street',
        'total_price',
        'total_price_excl_vat'
    ];
}
