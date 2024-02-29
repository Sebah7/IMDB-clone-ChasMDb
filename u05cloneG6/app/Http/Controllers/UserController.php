<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

  class UserController extends Controller
{
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('modify')->with('success', 'User deleted successfully.');
    }
}

