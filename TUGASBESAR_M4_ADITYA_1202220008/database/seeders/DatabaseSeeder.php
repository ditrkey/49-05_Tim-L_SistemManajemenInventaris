<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin1'],
            [
                'password' => Hash::make('admin'),
                'role' => 'kepala_gudang'
            ]
        );
        User::updateOrCreate(
            ['username' => 'admin2'],
            [
                'password' => Hash::make('admin'),
                'role' => 'admin_katalog'
            ]
        );
        User::updateOrCreate(
            ['username' => 'admin3'],
            [
                'password' => Hash::make('admin'),
                'role' => 'admin_vendor'
            ]
        );
        User::updateOrCreate(
            ['username' => 'admin4'],
            [
                'password' => Hash::make('admin'),
                'role' => 'admin_gudang'
            ]
        );
        User::updateOrCreate(
            ['username' => 'admin5'],
            [
                'password' => Hash::make('admin'),
                'role' => 'admin_armada'
            ]
        );
        User::updateOrCreate(
            ['username' => 'admin6'],
            [
                'password' => Hash::make('admin'),
                'role' => 'staff_gudang'
            ]
        );
    }
}
