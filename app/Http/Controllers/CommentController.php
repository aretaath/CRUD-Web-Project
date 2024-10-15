<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post)
    {
        Comment::create([
            'post_id' => $post,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post, $comment)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post, $comment)
    {
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post, $comment)
    {
        $comment = Comment::find($comment);

        $comment->delete();

        return to_route('dashboard', $post);

    }
}
