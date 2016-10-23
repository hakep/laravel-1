<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.index')->with('pages', $pages);
    }


    public function create()
    {
        return view('admin.pages.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        // не используется
    }


    public function edit($id)
    {
        $page = Page::Find($id);
        return view('admin.pages.edit')->with('page', $page);
    }


    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        // если нажата кнопка delete, то удаляем модель
        if ($request->has('delete')) {
            $page->delete();
            return redirect()->route('pages.index');
        }
        $page->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('pages.index');
    }
}
