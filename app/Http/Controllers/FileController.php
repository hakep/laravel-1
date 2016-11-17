<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;

class FileController extends Controller
{
    public function getFile($name)
    {
        $templateList = Storage::disk('layouts')->files();
        $templateList = collect($templateList);

        $content = Storage::disk('layouts')->get($name);

        return view('admin.files.index')->with(['name' => $name, 'content' => $content, 'templateList' => $templateList]);
    }


    public function updateFile($name, Request $request)
    {
        Storage::disk('layouts')->put($name, $request->input('content'));
        return response()->json(['message' => 'Данные сохранены']);
    }
}
