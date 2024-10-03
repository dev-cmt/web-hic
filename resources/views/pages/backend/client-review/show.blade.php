<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Client Review Details</h4>
                    <div class="mb-3">
                        <img src="{{ asset('public/'.$clientReview->img_path) }}" alt="Image" width="100">
                    </div>
                    <div>
                        <strong>Name: </strong> {{ $clientReview->name }}
                    </div>
                    <div>
                        <strong>Designation: </strong> {{ $clientReview->designation }}
                    </div>
                    <div>
                        <strong>Description: </strong> {{ $clientReview->description }}
                    </div>
                    <div>
                        <strong>Status: </strong> 
                        @if ($clientReview->status === 'active')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-warning">Inactive</span>
                        @endif
                    </div>
                    <a href="{{ route('client_reviews.index') }}" class="btn btn-primary mt-3">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
