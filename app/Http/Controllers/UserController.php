<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin_and_superadmin');
        $users = User::user(request(['cari']))->paginate(10);

        return view('users.index', compact('users'));

    }
}
