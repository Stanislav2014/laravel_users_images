<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index() {
        $images = Image::paginate(10);

        return view('images', ['images' => $images, 'paginate' => true]);
    }

    public function find(Request $request) {
        $userName = $request->userName;
        $user = User::where('name', $userName)->first();

        if (!$user) {
            return view('images', ['images' => [], 'errors' => ["{cant find user by $userName}"]]);
        }

        $images = Image::where('user_id', $user->id)->paginate(10);

        return view('images', ['images' => $images, 'paginate' => true]);
    }

}
