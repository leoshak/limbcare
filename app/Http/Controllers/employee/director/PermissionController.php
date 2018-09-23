<?php

namespace App\Http\Controllers\employee\director;

use App\Models\Auth\User\User;
use Illuminate\Http\Request;

class PermissionController
{
    public function index(Request $request)
    {
        $users = User::with(['roles', 'protectionValidation'])->sortable(['email' => 'asc'])->paginate();
        return view('employee.director.permissions', ['users' => $users]);
    }

    public function repeat(User $user, Request $request)
    {
        $protectionValidation = protection_validate($user);

        if ($request->expectsJson()) return response($protectionValidation->toArray());

        return redirect()->back();
    }
}
