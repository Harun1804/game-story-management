@extends('layouts.app')
@section('content-title','Game Project Section')
@section('active-route','Game Project Section')
@section('content')
@include('components.alert')
@inject('Persentase', 'App\Repositories\PersentaseClassForBlade')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('game-section.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PART</th>
                                <th>TITLE</th>
                                <th>STATUS</th>
                                <th>PROGRESS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($game_sections as $game_section)
                            <tr>
                                <td class="text-bold-500">{{ $loop->iteration }}</td>
                                <td>{{ $game_section->part }}</td>
                                <td class="text-bold-500">{{ $game_section->title }}</td>
                                <td>
                                    @switch($game_section->status)
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
                                    @if ($Persentase->project($game_section->id) == 0)
                                    <div class="progress progress-danger">
                                        <div class="progress-bar" role="progressbar" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    @elseif ($Persentase->project($game_section->id) <= 50)
                                    <div class="progress progress-danger">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_section->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_section->id) }}%</div>
                                    </div>
                                    @elseif ($Persentase->project($game_section->id) >= 51 && $Persentase->project($game_section->id) <= 80)
                                    <div class="progress progress-warning">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_section->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_section->id) }}%</div>
                                    </div>
                                    @else
                                    <div class="progress progress-success">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $Persentase->project($game_section->id) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $Persentase->project($game_section->id) }}%</div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ route('game-section.show', $game_section->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ route('game-section.edit', $game_section->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        </div>
                                        <div class="col-2">
                                            <form action="{{ route('game-section.destroy', $game_section->id) }}" method="POST">
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
