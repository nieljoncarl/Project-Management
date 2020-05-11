@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-tasks icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Tasks</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="scroll-area-xl">
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Project</th>
                                        <th class="text-center">Task Personnel</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks->sortBy('start')->sortBy('status') as $task)
                                    <tr>
                                        <td>
                                            <a href="{{route('task.show', $task)}}">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$task->name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('project.show', $task->project)}}">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$task->project->alias}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            {{implode(', ', $task->users()->get()->pluck('name')->toArray())}}
                                        </td>
                                        <td class="text-center">
                                            @if($task->status=="1")
                                                <div class="badge badge-default">Proposal</div>
                                            @elseif($task->status=="2")
                                                <div class="badge badge-info">Pending</div>    
                                            @elseif($task->status=="3")
                                                <div class="badge badge-warning">Approved</div>    
                                            @elseif($task->status=="4")
                                                <div class="badge badge-primary">In Progress</div>     
                                            @elseif($task->status=="5")
                                                <div class="badge badge-success">Completed</div>   
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('task.edit', $task)}}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('task.show', $task)}}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection