@extends('layouts.app')
  
@section('title', 'Edit Post')
  
@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-light btn-icon-split">
            <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Back</span>
        </a>  
    </div>
    <h1 class="mb-0">Edit Post</h1>
    <hr />
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title')is-invalid @enderror" placeholder="Title" value="{{ $post->title }}" >
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>        
        </div>
        <div class="row">            
            <div class="col mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control @error('content')is-invalid @enderror" name="content" placeholder="Content" >{{ $post->content }}</textarea>
                @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-success">Update your post</button>
            </div>
        </div>
    </form>
@endsection