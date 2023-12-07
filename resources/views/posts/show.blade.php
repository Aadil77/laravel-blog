@extends('layouts.app')
  
@section('title', 'Show Post')
  
@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-light btn-icon-split">
            <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Back</span>
        </a>  
    </div>
    <h1 class="mb-0">Post Detail</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $post->title }}" readonly>
        </div>
    </div>
    <div class="row">     
        <div class="col mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" name="content" placeholder="Content" readonly>{{ $post->content }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Published Date</label>
            <input type="text" name="created_at" class="form-control" placeholder="Published Date" value="{{ $post->created_at->format('d-M-Y') }}" readonly>
        </div>        
    </div>
@endsection