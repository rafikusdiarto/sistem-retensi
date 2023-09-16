<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $petugas = User::create([
            'name' => 'anna',
            'email' => 'anna@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($petugas));
        $petugas->assignRole('petugas');

        $kepala = User::create([
            'name' => 'kepala',
            'email' => 'kepala@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($kepala));
        $kepala->assignRole('kepala');
    }
}
