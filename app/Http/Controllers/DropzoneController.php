<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DropzoneController extends Controller
{
    function index()
    {
        return view('dropzone');
    }

    function upload(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();

        $image->move(public_path('uploads/albums'), $imageName);

        return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
        $images = File::allFiles(public_path('uploads/albums'));
        $output = '<ul id ="image-list">';
        foreach($images as $image)
        {
            $output .= '
            <li style="margin-bottom:16px;" align="center" class="ui-state-default">
                <img src="'.asset('uploads/albums/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </li>
      ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        if($request->get('name'))
        {
            File::delete(public_path('uploads/albums/' . $request->get('name')));
        }
    }
}
