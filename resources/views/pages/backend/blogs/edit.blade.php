<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Blog Post</h4>

                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method spoofing for PUT request -->

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $blog->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="cover_photo">Cover Photo</label>
                            <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                            @if($blog->cover_photo)
                                <p>Current Cover Photo:</p>
                                <img src="{{ asset('public/' . $blog->cover_photo) }}" alt="Cover Photo" style="max-width: 200px; max-height: 200px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish Date</label>
                            <input type="date" name="publish" id="publish" class="form-control" value="{{ old('publish', $blog->publish) }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ old('status', $blog->status) == '0' ? 'selected' : '' }}>Draft</option>
                                <option value="1" {{ old('status', $blog->status) == '1' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
