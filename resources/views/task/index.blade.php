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
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Active Tasks</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($tasks->where('status', '4')->sortBy('start') as $task)
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{$task->name}}
                                                </div>
                                                <div class="widget-subheading">
                                                    <div>Project: {{$task->project->alias}}</div>
                                                    <div>Duration: {{$task->start}} - {{$task->end}} </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <a href="{{route('task.show',$task)}}"><button class="border-0 btn-transition btn btn-outline-primary">
                                                    <i class="fa fa-eye"></i>
                                                </button></a>
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Approved Tasks</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($tasks->where('status', '3')->sortBy('start') as $task)
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{$task->name}}
                                                </div>
                                                <div class="widget-subheading">
                                                    <div>Project: {{$task->project->alias}}</div>
                                                    <div>Duration: {{$task->start}} - {{$task->end}} </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <a href="{{route('task.show',$task)}}"><button class="border-0 btn-transition btn btn-outline-primary">
                                                    <i class="fa fa-eye"></i>
                                                </button></a>
                                                <a href="http://"><button class="border-0 btn-transition btn btn-outline-primary">
                                                    <i class="fa fa-play-circle"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Pending Tasks</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($tasks->where('status', '2')->sortBy('start') as $task)
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{$task->name}}
                                                </div>
                                                <div class="widget-subheading">
                                                    <div>Project: {{$task->project->alias}}</div>
                                                    <div>Duration: {{$task->start}} - {{$task->end}} </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <a href="{{route('task.show',$task)}}"><button class="border-0 btn-transition btn btn-outline-primary">
                                                    <i class="fa fa-eye"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Completed Tasks</div>
                </div>
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
                                @foreach ($tasks->where('status', '5')->sortBy('status') as $task)
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