<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class ImageCropperController extends Controller
{
    public function index($id)
    {
        return view('artist.pages.posts.cropper',['post_id'=>$id]);
    }

    public function upload(Request $request, $id)
    {
        //dd($request->post_id);
        $folderPath = public_path('storage/postphotos/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename=uniqid() . '.jpeg';
        $file = $folderPath . $filename;

        file_put_contents($file, $image_base64);
        Photo::create([
//            'post_id'=>$request->input('post_id'),
            'post_id'=>$id,
            'img_url'=>'storage/postphotos/'.$filename,
        ]);
        return response()->json(['success'=>'success']);
    }
}
