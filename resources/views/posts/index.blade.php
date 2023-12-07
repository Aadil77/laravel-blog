@extends('layouts.app')
  
@section('title', 'Posts')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create a new post</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>                
                <th>Published Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($post->count() > 0)
                @foreach($post as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ Str::limit($rs->title, 30) }}</td>
                        <td class="align-middle">{{ Str::limit($rs->content, 30) }}</td>                        
                        <td class="align-middle">{{ $rs->created_at->format('d-M-Y') }}</td>                        
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('posts.show', $rs->id) }}" type="button" class="btn btn-secondary">Show</a>
                                <a href="{{ route('posts.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No post available</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection