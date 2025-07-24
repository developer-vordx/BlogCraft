<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = Tenant::all();

        foreach ($tenants as $tenant) {
            Category::withoutGlobalScopes()->insert([
                ['name' => 'Writing Tips', 'tenant_id' => $tenant->id],
                ['name' => 'SEO', 'tenant_id' => $tenant->id],
                ['name' => 'Technology', 'tenant_id' => $tenant->id],
                ['name' => 'Branding', 'tenant_id' => $tenant->id],
                ['name' => 'Lifestyle', 'tenant_id' => $tenant->id],
            ]);
        }
    }
}
