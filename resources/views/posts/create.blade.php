@extends('layouts.app')
  
@section('title', 'Create Post')
  
@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-light btn-icon-split">
            <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Back</span>
        </a>  
    </div>
    <h1 class="mb-0">Add Post</h1>
    <hr />
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control @error('title')is-invalid @enderror" placeholder="Title"  value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>            
        </div>
        <div class="row mb-3">            
            <div class="col">
                <textarea class="form-control @error('content')is-invalid @enderror" name="content" placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection