<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id_sales';

    protected $fillable = [
        'id_sales',
        'tgl_sales',
        'id_customer',
        'do_number',
        'status',
    ];
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }
}
