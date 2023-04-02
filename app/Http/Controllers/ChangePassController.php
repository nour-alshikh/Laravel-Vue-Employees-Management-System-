<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function changePass(Request $request , User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect( route('users.index') )->with('message' , 'Password Updated Successfully');
    }
}
