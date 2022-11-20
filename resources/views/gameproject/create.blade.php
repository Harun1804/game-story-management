@extends('layouts.app')
@section('content-title','Game Project')
@section('active-route','Game Project Create')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ route('game-project.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <h6>Project Name</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="project name" name="title" value="{{ old('title') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-unity"></i>
                            </div>
                        </div>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Project Thumbnail</label>
                        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="formFile" name="thumbnail">
                        @error('thumbnail')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
