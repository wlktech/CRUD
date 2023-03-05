@extends('../layouts.master')

@section('title', 'User List')

@section('content')

<div class="container mt-5">
    <h3 class="d-inline me-2">User Lists</h3> <a href="{{ url('register') }}" class="btn btn-primary d-inline">Add Users</a>
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ Session::get('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive mt-3">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href='{{ url("/users/$user->id") }}' class="btn btn-sm btn-primary">Edit</a>
                        <a href='{{ url("/users/$user->id/delete") }}' class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection