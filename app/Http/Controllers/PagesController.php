<?php

namespace App\Http\Controllers;

use Auth;

class PagesController extends Controller
{
    //

    public function myProfile_main()
    {
        $user = Auth::user();
        return view('profile.main', compact($user));
    }

    public function myProfile_myPosts()
    {
        $user = Auth::user();
        return view('profile.myposts', compact($user));
    }

    public function myProfile_Followers()
    {
        $user = Auth::user();
        return view('profile.followers', compact($user));
    }

    public function myProfile_Following()
    {
        $user = Auth::user();
        return view('profile.following', compact($user));
    }

    public function myProfile_myBrands()
    {
        $user = Auth::user();
        return view('profile.mybrands', compact($user));
    }

}
