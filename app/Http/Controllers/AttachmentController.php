<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        $extension = $request->file('uploaded_file')->extension();
        $path = Storage::putFileAs('artico', $request->file('uploaded_file'), time() . '.' . $extension);
        dd($path);
    }

    public function show()
    {
        $file = Storage::get("artico/1535603885.png");
        $headers = [
            'Content-Type' => 'image/png'
        ];
        return response($file, 200, $headers);
    }
}