<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Storage;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $image = new Image();

            $url = 'https://source.unsplash.com/random/300x400';
            $imageId = date('mdYHis') . uniqid();
            $contents = file_get_contents($url);

            Storage::disk('public')->put('images/' . $imageId . '.jpg', $contents);

            $user = User::all()->random(1)->first();

            $image->uuid = $imageId;

            $image->user()->associate($user);

            $image->save();
        }
    }
}
