@extends('layouts.app')
@section('content-title','Game Project Section')
@section('active-route','Game Project Section Create')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ route('game-section.store') }}">
                    @csrf
                    <div class="mb-3">
                        <h6>Game Project</h6>
                        <fieldset class="form-group">
                            <select class="form-select @error('game_project_id') is-invalid @enderror" name="game_project_id">
                                <option>Choose...</option>
                                @foreach ($game_projects as $game_project)
                                    <option value="{{ $game_project->id }}">{{ $game_project->title }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        @error('game_project_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>Section Title</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="section title" name="title" value="{{ old('title') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-journals"></i>
                            </div>
                        </div>
                        @error('title')
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
