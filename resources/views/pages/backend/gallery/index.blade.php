<x-app-layout :title="'Photo Album List'">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Photo Album List</h4>
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create gallery
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Album Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-right pr-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=> $row )
                            <tr>
                                <td class="sorting_1"><img class="rounded-circle" src="{{asset('public/images/gallery')}}/{{ $row->cover }}" width="35" height="35" alt=""></td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->date}}</td>
                                <td>
                                    @if($row->public==1)
                                        <span class="badge badge-success">Public</span>
                                    @else
                                        <span class="badge badge-warning">Private</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-end">
                                    {{-- @can('Gallery edit') --}}
                                    <a href="{{route('gallery.edit', $row ->id)}}" class="btn btn-success btn-sm m-1">Edit</a>
                                    {{-- @endcan --}}
                                    <a href="{{route('gallery.show', ['gallery' => $row->id])}}" class="btn btn-info btn-sm m-1">View</a>
                                    {{-- @can('Gallery delete') --}}
                                    <form action="{{route('gallery.destroy', $row->id)}}" method="post">
                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    {{-- @endcan --}}
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
