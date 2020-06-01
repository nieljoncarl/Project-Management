@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-book icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Task Report: {{ $user->name}}</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Tasks Performed from {{Carbon\Carbon::parse($request_start)->format('H:i M d, Y')}} to {{Carbon\Carbon::parse($request_end)->format('H:i M d, Y')}}</h5>
                <div class="table-responsive">
                    <table class="mb-0 table text-center">
                        <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Deliverable</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Date Started</th>
                            <th>Date Ended</th>
                            <th>Personnel</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{!!$task->deliverable!!}</td>
                                <td>{{$task->start}}</td>
                                <td>{{$task->end}}</td>
                                <td>{{$task->started}}</td>
                                <td>{{$task->ended}}</td>
                                <td>{{implode(', ',$task->users()->get()->pluck('name')->toArray())}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection