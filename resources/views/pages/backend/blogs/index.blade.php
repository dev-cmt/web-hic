<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Blog Posts</h4>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create Posts
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th> Publish Date </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ date('j F Y', strtotime($blog->publish)) }}</td>
                                <td>
                                    @if ($blog->status == 1)
                                        <strong class="text-success">Published</strong>
                                    @else
                                        <strong class="text-warning">Draft</strong>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
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
</x-app-layout>
