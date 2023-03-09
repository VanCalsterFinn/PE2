<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'country' ,
        'city',
        'zip',
        'street',
        'invoice_date',
        'due_date',
        'order_number',
    ];
}
