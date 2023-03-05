@extends('../layouts.master')

@section('title', 'Post List')

@section('content')
<div class="container mt-5">
    <a href='{{ url("logout") }}' class="btn btn-outline-dark mb-5">Logout</a>
    <div class="table-responsive">
        <h3 class="d-inline me-2">Post Lists</h3> <a href="{{ url('post') }}" class="btn btn-primary d-inline">Create Post</a>
        @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-hovered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach($posts as $post)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <a href='{{ url("posts/$post->id") }}' class="btn btn-sm btn-primary">Edit</a>
                        <a href='{{ url("posts/$post->id/delete") }}' class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection