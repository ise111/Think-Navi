<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('profile')->with('user', Auth::user());
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $avatar = $request->avatar;
        if ($avatar) {
            if($user->avatar_file_name){
                Storage::disk('public')->delete('avatars/' . $user->avatar_file_name);
            }
            $avatarName = $avatar->getClientOriginalName();
            $avatar->storeAs('public/avatars/', $avatarName);
        }

        $user->avatar_file_name = $avatarName;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('status', 'プロフィールを更新しました。');
    }

    public function deleteUser(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect('/');
    }
}
