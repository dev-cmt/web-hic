<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title">Client Reviews</h4>
                        <a href="{{ route('client_reviews.create') }}" class="btn btn-primary">Add New Review</a>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td><img src="{{ asset('public/'.$review->img_path) }}" alt="Image" width="50"></td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->designation }}</td>
                                        <td>
                                            @if ($review->status === 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('client_reviews.show', $review->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('client_reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('client_reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
