<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petugas::create([
            'id_user' => '454',
            'nama_user' => 'andri',
            'username' => 'andri',
            'password' => Hash::make('passw'),
            'level' => 1,
        ]);
    }
}
