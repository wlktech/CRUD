@extends("../layouts.master")

@section('title', 'Post')


@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ url('post') }}" method="POST">
                <h3>Add Post</h3>
                @if($errors->any())
                @foreach($errors->all() as $err)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$err}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>





@endsection