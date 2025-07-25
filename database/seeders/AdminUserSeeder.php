<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'tenant_id'     => 1,
                'first_name'    => 'Super',
                'last_name'     => 'Admin',
                'email'         => 'admin@example.com',
                'country_code'  => '+1',
                'phone'         => '1234567890',
                'country'       => 'USA',
                'state'         => 'California',
                'city'          => 'Los Angeles',
                'zip'           => '90001',
                'address'       => '123 Admin Street',
                'password'      => Hash::make('password123'),
                'google_id'     => null,
                'facebook_id'   => null,
                'status'        => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
