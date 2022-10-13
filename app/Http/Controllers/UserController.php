<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy("created_at", "DESC")->paginate(5);
        return view("admin.users.users", ["users" => $users]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            if ($user->is_admin == 1)
                abort(403);
            else {
                $user->delete();
                return redirect()->route("users");
            }
        } else
            abort(404);
    }
}
