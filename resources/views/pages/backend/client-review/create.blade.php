<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Client Review</h4>
                    <form action="{{ route('client_reviews.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="img_path">Image</label>
                            <input type="file" class="form-control @error('img_path') is-invalid @enderror" name="img_path" id="img_path">
                            @error('img_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Designation Input -->
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') }}" required>
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Textarea -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Dropdown -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Create Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
