@extends('layouts.app')
@section('content-title','Game Project')
@section('active-route','Game Project')
@section('content')
@include('components.alert')
@inject('Persentase', 'App\Repositories\PersentaseClassForBlade')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('game-project.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>THUMBNAIL</th>
                                <th>PROJECT TITLE</th>
                                <th>STATUS</th>
                                <th>PROGRESS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($game_projects as $game_project)
                            <tr>
                                <td class="text-bold-500">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $game_project->thumbnail }}" width="25%">
                                </td>
                                <td class="text-bold-500">{{ $game_project->title }}</td>
                                <td>
                                    @switch($game_project->status)
                                        @case(0)
                                            <div class="badge text-bg-danger">New</div>
                                            @break
                                        @case(1)
                                            <div class="badge text-bg-info">On Progress</div>
                                            @break
                                        @default
                                            <div class="badge text-bg-success">Finish</div>
                                    @endswitch
                                </td>
                                <td>
                                    @if ($Persentase->project($game_project->id) == 0)
                                    <div class="progress progress-danger">
                                        <div class="progress-bar" role="progressbar" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    @elseif ($Persentase->project($game_project->id) <= 50)
                                    <div class="progress progress-danger">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_project->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_project->id) }}%</div>
                                    </div>
                                    @elseif ($Persentase->project($game_project->id) >= 51 && $Persentase->project($game_project->id) <= 80)
                                    <div class="progress progress-warning">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_project->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_project->id) }}%</div>
                                    </div>
                                    @else
                                    <div class="progress progress-success">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_project->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_project->id) }}%</div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <a href="{{ route('game-project.edit', $game_project->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        </div>
                                        <div class="col-4">
                                            <form action="{{ route('game-project.destroy', $game_project->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you Sure?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td style="text-align: center" colspan="6">No Data Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
