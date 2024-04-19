<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $token = Str::random(80);
        User::create([
            'email' => "admin@admin.com",
            'password' => 'password',
            'remember_token' => hash('sha256', $token),
        ]);
    }
}
