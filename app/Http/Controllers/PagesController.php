<?php

namespace App\Http\Controllers;

use App\Brand;
use App\follower;
use App\Post;
use App\User;
use Auth;

class PagesController extends Controller
{
    //---------------Route Functions------------------------

    public function index()
    {
        $user = Auth::user();
        $managed_brands = Brand::where('owner_id', $user->id)->get();
        $feed = $this->getPosts($user->id);

        return view('home', ['managed_brands' => $managed_brands, 'posts' => $feed]);
    }

    public function newBrand()
    {
        return view('create.brand');
    }

    public function myProfile_main()
    {
        $user = Auth::user();
        $user->password = null;

        return view('profile.main', ['user' => $user]);
    }

    public function myProfile_main_edit()
    {
        $user = Auth::user();

        return view('edit.myprofile', ['user' => $user]);
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

    public function getManagedBrands($user_id)
    {
        $managed_brands = Brand::where('owner_id', $user_id)->get();
        return $managed_brands;
    }

    public function getFollowerCount($brand_id)
    {
        $followerCount = follower::where('brand_id', $brand_id)->count();
        return $followerCount;
    }

    public function getFollowedBrandIds($user_id)
    {
        $followed_brandsIds = follower::where('follower_id', $user_id)->pluck('brand_id');
        return $followed_brandsIds;
    }

    public function getFollowedBrands($user_id)
    {
        $followed_brands = follower::where('follower_id', $user_id)->get();
        return $followed_brands;
    }

    public function getPosts($user_id)
    {
        $followed_brands = $this->getFollowedBrands($user_id);
        $brandIds = $this->getFollowedBrandIds($user_id);
        $feed_data = Post::whereIn('brand_id', $brandIds)->latest()->get();

        $feed = [];

        for ($i = 0; $i < sizeof($feed_data); $i++) {
            $brand_id = $feed_data[i]->brand_id;
            for ($j = 0; $j < $followed_brands; $j++) {
                if ($followed_brands[j]->id == $brand_id) {
                    $feed_data[i]->brand_name = $followed_brands[j]->name;
                    continue;
                }
            }
            array_push($feed, $feed_data[i]);
        }
        return $feed;
    }

}
