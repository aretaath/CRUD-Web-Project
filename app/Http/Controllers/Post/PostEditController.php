<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostEditController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        $post = Post::find($id); 

        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }
}
