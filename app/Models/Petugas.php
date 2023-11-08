<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'petugas';
    protected $fillable = [
        'id_user',
        'nama_user',
        'username',
        'password',
        'level_id',
    ];
    public $timestamps = false;
}
