<?php

namespace App\Http\Controllers;

use App\Brand;
use Auth;

class PagesController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $brands = Brand::where('owner_id', $user->id)->get();

        return view('home', ['brands' => $brands]);
    }

    public function newBrand()
    {
        return view('create.brand');
    }

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
