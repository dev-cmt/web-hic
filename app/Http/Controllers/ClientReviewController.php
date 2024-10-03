<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImageHelper;
use App\Models\ClientReview;
use App\Models\User;

class ClientReviewController extends Controller
{
    // Display a listing of the resource (index)
    public function index()
    {
        $reviews = ClientReview::all();
        return view('pages.backend.client-review.index', compact('reviews'));
    }

    // Show the form for creating a new resource (create)
    public function create()
    {
        return view('pages.backend.client-review.create');
    }

    // Store a newly created resource in storage (store)
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Ensure it's an image with valid extensions
            'name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Check if an image file is uploaded
        if ($request->hasFile('img_path')) {
            // Use ImageHelper to handle the image upload and get the file path
            $validated['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/review', null);
        }

        // Create a new client review with the validated data
        ClientReview::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('client_reviews.index')->with('success', 'Review created successfully.');
    }


    // Display the specified resource (show)
    public function show(ClientReview $clientReview)
    {
        return view('pages.backend.client-review.show', compact('clientReview'));
    }

    // Show the form for editing the specified resource (edit)
    public function edit(ClientReview $clientReview)
    {
        return view('pages.backend.client-review.edit', compact('clientReview'));
    }

    // Update the specified resource in storage (update)
    public function update(Request $request, ClientReview $clientReview)
    {
        // Validate the request data
        $validated = $request->validate([
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image with valid extensions
            'name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Check if an image file is uploaded
        if ($request->hasFile('img_path')) {
            // Use ImageHelper to handle the image upload and get the new file path
            $validated['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/review', $clientReview->img_path);
        }

        // Update the review with the validated data
        $clientReview->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('client_reviews.index')->with('success', 'Review updated successfully.');
    }


    // Remove the specified resource from storage (destroy)
    public function destroy(ClientReview $clientReview)
    {
        $clientReview->delete();

        return redirect()->route('client_reviews.index')->with('success', 'Review deleted successfully.');
    }
}
