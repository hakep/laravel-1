<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;

class FilesController extends Controller
{

    public function index()
    {
        $templateList = Storage::disk('layouts')->files();
        return view('admin.files.index')->with(['templateList' => $templateList]);
    }


    public function getFile($name)
    {
        $templateList = Storage::disk('layouts')->files();
        $content = Storage::disk('layouts')->get($name);

        return view('admin.files.file')->with(['name' => $name, 'content' => $content, 'templateList' => $templateList]);
    }


    public function updateFile($name, Request $request)
    {
        Storage::disk('layouts')->put($name, $request->input('content'));
        return response()->json(['message' => 'Данные сохранены']);
    }
}
