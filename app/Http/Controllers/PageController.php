<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;


class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.index')->with('pages', $pages);
    }


    public function create()
    {
        $templateList = Storage::disk('template')->files();
        $templateList = collect($templateList);

        return view('admin.pages.create')->with('templateList', $templateList);
    }


    public function store(Request $request)
    {
        $page = Page::create($request->all());
//        dd($page);
        return response()->json(['message' => 'Данные сохранены', 'redirect_url' => route('pages.edit', $page->id)]);
    }

    public function edit($id)
    {
        $page = Page::Find($id);
        $templateList = Storage::disk('template')->files();
        $templateList = collect($templateList);
        return view('admin.pages.edit')->with(['page' => $page, 'templateList' => $templateList]);
    }


    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->update($request->all());
        return response()->json(['message' => 'Данные сохранены']);
    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return response()->json(['message' => 'Страница удалена', 'redirect_url' => route('pages.index')]);
    }
}
