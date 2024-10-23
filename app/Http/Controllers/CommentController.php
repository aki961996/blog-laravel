<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('admin.comment.list', ['comment' => $comment]);
    }

    public function create(Request $request)
    {
       
        return view('admin.comment.add');
    }
    public function store(Request $request)
    {

        $request->validate([
            'comment' => 'required',
           

        ]);


        $comment = new Comment();
        $blog = new Blog();
        $comment->comment = trim($request->comment);
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $blog->id;
    
        $comment->save();
        return redirect()->route('blog.list')->with('success', 'New comment successfully addedd');
    }
    public function edit($id)
    {


        $id = decrypt($id);
        $blog = Comment::find($id);
    
        return view('admin.comment.edit', ['blog' => $blog]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'comment' => 'required',
           

        ]);

        $id = $request->id;
        $blog = new Blog();
        $blog = Comment::getSingleData($id);
        $blog->comment = trim($request->title);
     
        $blog->user_id = Auth::user()->id;
        $blog->content = $blog->id;
       
       
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'Comment Updated Successfully');
    }

    public function destroy($id)
    {
        $id = $id;
        $comment = Comment::find($id);
     
        $comment->save();
        return redirect()->route('blog.list')->with('success', 'comment deleted successfully');
    }
}
