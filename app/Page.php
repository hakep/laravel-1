<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['url', 'title', 'status', 'content', 'template', 'meta_title', 'meta_keywords', 'meta_description'];
}
