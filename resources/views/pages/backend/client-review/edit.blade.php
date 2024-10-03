<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Client Review</h4>
                    <form action="{{ route('client_reviews.update', $clientReview->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="img_path">Image</label>
                            <input type="file" class="form-control" name="img_path" id="img_path">
                            <img src="{{ asset('public/'.$clientReview->img_path) }}" alt="Image" width="50" class="mt-2">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $clientReview->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" value="{{ $clientReview->designation }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{{ $clientReview->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="active" {{ $clientReview->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $clientReview->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
