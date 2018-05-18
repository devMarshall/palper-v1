<?php

namespace App\Http\Controllers;

use App\Brand;
use App\follower;
use Auth;

class UserController extends Controller
{
    //

    public function follow($brand_id)
    {
        $user_id = Auth::user()->id;
        $brand = Brand::where('id', $brand_id)->first();

        $follower = new follower();

        $follower->brand_id = $brand_id;
        $follower->user_id = $user_id;

        $follower->save();

        return $brand->name . ' followed successfully';

    }

    public function unfollow($brand_id)
    {
        $user_id = Auth::user()->id;
        $brand = Brand::where('id', $brand_id)->first();

        $follower = follower::where('user_id', $user_id)->where('brand_id', $brand_id)->first();

        $follower->delete();

        return $brand->name . ' unfollowed successfully';

    }

}
