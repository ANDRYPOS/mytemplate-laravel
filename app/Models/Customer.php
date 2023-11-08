<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'id_customer',
        'nama_customer',
        'alamat',
        'telp',
        'fax',
        'email'
    ];
    public $timestamps = false;
}
