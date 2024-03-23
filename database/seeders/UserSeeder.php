<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullName' => 'Anandito Satria Asyraf',
            'nickname' => 'Anandito',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234567890',
            'address' => 'Jl. Sukabirus F10',
            'role' => 'Administrator'
        ]);

        User::create([
            'fullName' => 'Atilla Fejril',
            'nickname' => 'Atilla',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234567870',
            'address' => 'Jl. Sukabirus F30',
            'role' => 'Administrator'
        ]);

        User::create([
            'fullName' => 'Nugroho Rahmanto',
            'nickname' => 'Nugroho',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081334567810',
            'address' => 'Jl. Sukabirus F20',
            'role' => 'Administrator'
        ]);

        User::create([
            'fullName' => 'Vioni',
            'nickname' => 'Vioni',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234562270',
            'address' => 'Jl. Sukabirus F30',
            'role' => 'Administrator'
        ]);

        User::create([
            'fullName' => 'Nabila Aurellia',
            'nickname' => 'Nabila',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234555870',
            'address' => 'Jl. Sukabirus No 65',
            'role' => 'Administrator'
        ]);

        User::create([
            'fullName' => 'Owner',
            'nickname' => 'Owner',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234555555',
            'address' => 'Jl. Sukabirus No 65',
            'role' => 'Owner'
        ]);

        User::create([
            'fullName' => 'Seller',
            'nickname' => 'Seller',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234552086',
            'address' => 'Jl. Sukabirus No 65',
            'role' => 'Seller'
        ]);

        User::create([
            'fullName' => 'Buyer',
            'nickname' => 'Buyer',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234559105',
            'address' => 'Jl. Sukabirus No 65',
            'role' => 'Buyer'
        ]);
    }
}
