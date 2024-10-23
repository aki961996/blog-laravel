<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::getRecord();
        return view('admin.blog.list', ['blog' => $blog]);
    }

    public function create(Request $request)
    {
       
        return view('admin.blog.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'author' => 'required',
            'date' => 'required',
            'image' => 'required'

        ]);


        $blog = new Blog();
        $blog->name = trim($request->name);
    
        $blog->user_id = Auth::user()->id;
        
        $blog->content = trim($request->content);
     
        $blog->author = trim($request->author);
        $blog->date = trim($request->date);
        $blog->status = trim($request->status);
        $blog->is_delete = 0;

        if ($request->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'blog_image_' . time() . '.' . $extension;

            request('image')->storeAs('images', $fileName);

            $blog->image = $fileName;
        }


        $blog->save();
        return redirect()->route('blog.list')->with('success', 'New Blog successfully addedd');
    }

    public function edit($id)
    {


        $id = decrypt($id);
        $blog = Blog::find($id);
    
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $id = $request->id;
        $blog = Blog::getSingleData($id);
        $blog->name = trim($request->title);
     
        $blog->user_id = Auth::user()->id;
        $blog->content = trim($request->content);
       
       
        $blog->author = trim($request->author);
        $blog->date = trim($request->date);
        $blog->status = trim($request->status);
        $blog->is_delete = 0;
        //image upload code
        if ($request->hasFile('image')) {
            Storage::delete('images/' . $blog->image);
            $extension = request('image')->extension();
            $fileName = 'blog_image' . time() . '.' . $extension;
            request('image')->storeAs('images', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'Blog Updated Successfully');
    }


    public function destroy($id)
    {
        $id = $id;
        $category = Blog::find($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->route('blog.list')->with('success', 'Blog deleted successfully');
    }

    
}
