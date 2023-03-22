<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'freight',
        'from_country',
        'from_city',
        'from_zip',
        'from_street',
        'to_country',
        'to_city',
        'to_zip',
        'to_street',
        'invoice_date',
        'due_date',
        'total_price',
        'total_price_excl_vat'
    ];
}
