<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Blog;
use App\Models\User;
use App\Helpers\ImageHelper;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.backend.blogs.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image',
            'publish' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        // Check if a cover photo is uploaded and handle the upload using ImageHelper
        if ($request->hasFile('cover_photo')) {
            // Use ImageHelper to upload the image and store the path in $validated
            $validated['cover_photo'] = ImageHelper::uploadImage($request->file('cover_photo'), 'images/blogs', null);
        }

        $validated['user_id'] = Auth::id();

        // Create the blog post using validated data
        Blog::create($validated);

        // Redirect back to the blog index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }


    public function show(Blog $blog)
    {
        return view('pages.backend.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('pages.backend.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image',
            'publish' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        // Check if a new cover photo is uploaded
        if ($request->hasFile('cover_photo')) {
            // Use ImageHelper to upload the new image
            $validated['cover_photo'] = ImageHelper::uploadImage($request->file('cover_photo'), 'images/blogs', null);
        }

        $validated['user_id'] = Auth::id();

        // Update the blog with the validated data
        $blog->update($validated);

        // Redirect back to the blog index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
