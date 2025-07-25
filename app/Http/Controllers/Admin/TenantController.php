<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function index()
    {
        $tenants = Tenant::paginate(10);
        return view('admin.tenants.index', compact('tenants'));
    }

    public function show($id)
    {
        $tenant = \App\Models\Tenant::find($id);
        return view('admin.tenants.show', compact('tenant'));
    }
}
