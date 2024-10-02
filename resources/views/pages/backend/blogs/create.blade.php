<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Blog Post</h4>

                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="cover_photo">Cover Photo</label>
                            <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish Date</label>
                            <input type="date" name="publish" id="publish" class="form-control" value="{{ old('publish') }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
