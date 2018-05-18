<?php

namespace App\Http\Controllers;

use App\Brand;
use App\follower;
use App\User;
use Auth;

class PagesController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $managed_brands = Brand::where('owner_id', $user->id)->get();

        return view('home', ['managed_brands' => $managed_brands]);
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

    // public function myProfile_Followers()
    // {
    //     $user = Auth::user();
    //     return view('profile.followers', compact($user));
    // }

    public function myProfile_Following()
    {
        $user = Auth::user();
        $followed_brands = follower::where('follower_id', $user->id)->get();

        $brands = [];

        if (sizeof($followed_brands) != 0) {

            for ($i = 0; $i < sizeof($followed_brands); $i++) {

                $brand = Brand::where('id', $followed_brands[$i]->brand_id)->first();

                $brands[$i] = $brand;
            }

        }

        // return $brands;

        return view('profile.following', ['brands' => $brands]);
    }

    public function myProfile_myBrands()
    {
        $user = Auth::user();
        $brands = Brand::where('owner_id', $user->id)->get();

        return view('profile.mybrands', ['brands' => $brands]);
    }

    //---------------Helper Functions------------------------

    public function get_followerIds($brand_id)
    {
        $follower_ids = follower::where('brand_id', $brand_id)->pluck('user_id');

        return $follower_ids;
    }

    public function getUsers($user_ids)
    {

        $users = [];

        if (sizeof($user_ids) != 0) {
            for ($i = 0; $i < sizeof($user_ids); $i++) {
                $user = User::where('id', $$user_ids[$i])->first();
                $user->password = null;
                $users[$i] = $user;
            }
        }

        return $users;
    }

    public function getFollowedBrandIds($user_id)
    {
        $followed_brandsIds = follower::where('follower_id', $user_id)->pluck('brand_id');
        return $followed_brandsIds;
    }

    public function getBrands($brandIds)
    {
        $brands = [];

        if (sizeof($brandIds) != 0) {
            for ($i = 0; $i < sizeof($brandIds); $i++) {
                $brand = Brand::where('id', $brandIds[$i])->first();
                $brands[$i] = $brand;
            }
        }

        return $brands;
    }

    public function getFollowerCount($brand_id)
    {
        $followerCount = follower::where('brand_id', $brand_id)->count();
        return $followerCount;
    }

    public function getFeed($user_id)
    {
        $brandIds = getFollowedBrandIds($user_id);

        $feed = Posts::whereIn('brand_id', $brandIds)->latest->get();

    }

}
