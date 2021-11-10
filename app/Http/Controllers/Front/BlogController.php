<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showPageList()
    {
        $list = Blog::orderBy('id', 'DESC')
            ->paginate(10);
        return view('front.blog.list', compact('list'));

    }

    public function showPageText(string $slug)
    {
        $news = Blog::where('slug', $slug)
            ->with('getSeo')
            ->firstOrFail();

        \MetaTag::setTags([
            'title' => $news->getSeo->title ?? null,
            'description' => $news->getSeo->description ?? null,
        ]);

        return view('front.blog.news', compact('news'));
    }
}
