<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Post::orderBy('published_at', 'desc')->simplePaginate(5);
        $items = [];
        foreach ($posts->items() as $post) {
            $item['id'] = $post->id;
            $item['title'] = $post->title;
            $item['summary'] = $post->subtitle;
            $item['thumb'] = url(config('blog.uploads.webpath') . '/' . $post->thumbnail);
            $item['posted_at'] = $post->published_at;
            $item['views'] = $post->visited;
            $items[] = $item;
        }
        $data = [
            'message' => 'success',
            'articles' => $items
        ];
        return response()->json($data);
    }
}
