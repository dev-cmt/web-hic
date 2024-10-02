<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Free Consultation</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone </th>
                                <th> Message </th>
                                <th> Submitting </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{date("j F Y", strtotime($row->created_at))}}</td>
                                <td>
                                    @if ($row->status != 0)
                                        <p class="m-0 mb-2"><strong class="text-success">Email Reply Successfully.</strong></p>
                                    @elseif ($row->status == 0)
                                    {{-- @can('Contact reply') --}}
                                    <a href="{{route('contact-us.reply', $row->id)}}" class="btn btn-primary btn-sm">Reply</a>
                                    {{-- @endcan --}}
                                    {{-- @can('Contact delete') --}}
                                    <a href="{{route('contact-us.delete', $row->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                    {{-- @endcan --}}
                                    @endif
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