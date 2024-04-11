<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'po_code',
        'tax_perc',
        'tax',
        'remarks',
        'status',
        'date_created',
        'date_updated',
        'amount'
    ];
}
