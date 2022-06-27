<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('superadmin');
        $roles = Role::paginate();

        return view('roles.index', compact('roles'));
    }
}
