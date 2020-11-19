<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CropImageController extends Controller
{
    public function index()
    {
        return view('artist.pages.posts.croppie');
    }

    public function uploadCropImage(Request $request)
    {

        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('storage/postphotos/'.$image_name);
        file_put_contents($path, $image);
        return response()->json(['status'=>true]);


    }


}
