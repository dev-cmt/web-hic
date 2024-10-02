<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <p><strong>Published on:</strong> {{ date('j F Y', strtotime($blog->publish)) }}</p>
                    <p>{{ $blog->description }}</p>

                    @if ($blog->cover_photo)
                        <p><strong>Cover Photo:</strong></p>
                        <img src="{{ asset('public/' . $blog->cover_photo) }}" alt="Cover Photo" class="img-fluid">
                    @endif

                    <p><strong>Status:</strong> 
                        @if ($blog->status == 1)
                            <span class="text-success">Published</span>
                        @else
                            <span class="text-warning">Draft</span>
                        @endif
                    </p>

                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
