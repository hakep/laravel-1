<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function page($url)
    {
        $page = Page::where([['url', '=', $url], ['status', '=', '1']])->firstOrFail();
        return view('site.pages.page')->with('page', $page);
    }
}
