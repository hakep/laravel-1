<?php

namespace App\Http\Controllers;

use Storage;


class FileController extends Controller
{
    public function getFile($name)
    {
        $content = Storage::disk('layouts')->get($name);

        return view('admin.files.index')->with('content', $content);
    }
}
