<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Tenant::factory()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Tenant::factory()->create([
            'name' => 'Tenant1',
            'slug' => 'tenant1',
        ]);

        Tenant::factory()->create([
            'name' => 'Tenant2',
            'slug' => 'tenant2',
        ]);
    }
}
