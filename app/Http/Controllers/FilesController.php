<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;

class FilesController extends Controller
{

    public function index()
    {
        $layoutsList = Storage::disk('layouts')->files();
        $cssList = Storage::disk('css')->files();
        $jsList = Storage::disk('js')->files();

        return view('admin.files.index')->with(['layoutsList' => $layoutsList, 'cssList' => $cssList, 'jsList' => $jsList]);
    }


    public function getFile($name)
    {
//        dd(str_is('*.css', $name));

        if(str_is('*.css', $name)){
            $content = Storage::disk('css')->get($name);
        } elseif (str_is('*.js', $name)){
            $content = Storage::disk('js')->get($name);
        } else {
            $content = Storage::disk('layouts')->get($name);
        }







        return view('admin.files.file')->with(['name' => $name, 'content' => $content]);
    }


    public function updateFile($name, Request $request)
    {
        Storage::disk('layouts')->put($name, $request->input('content'));
        return response()->json(['message' => 'Данные сохранены']);
    }
}
