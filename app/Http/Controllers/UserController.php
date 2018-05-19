<?php

namespace App\Http\Controllers;

use App\Brand;
use App\follower;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Cloudder;
use Illuminate\Http\Request;

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

    public function updateProfile(Request $request)
    {

        $this->validate($request, [
            'f_name' => 'required|unique:brands|string|max:255',
            'l_name' => 'required|string|max:255',
            'user_handle' => 'required|string|max:255|unique:users',
        ]);

        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        if ($request->file('avatar') !== null) {
            $avatar = $request->file('avatar')->getRealPath();
            $cloudinaryOptions = ['upload_preset' => 'zh5zmnzn'];
            list($width, $height) = getimagesize($avatar);
            Cloudder::upload($avatar, null, $cloudinaryOptions);
            $user->avatar = Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);
        }

        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->user_handle = $request->input('user_handle');

        $user->save();

        return redirect(url('/profile/my/main/edit'))->with('success', 'Brand Created');

    }

}
