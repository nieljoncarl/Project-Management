@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-tasks icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Tasks: {{$project->name}}</div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-eye fa-w-20"></i>
                    </span>
                    View
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(111px, 33px, 0px);">
                    @can('manage-project', $project)
                    <a href=" {{route('project.show', $project)}} " tabindex="0" class="dropdown-item">
                        Summary
                    </a>     
                    <button type="button" tabindex="0" class="dropdown-item">
                        Gantt Chart
                    </button>     
                    <a href=" {{route('project.tasks', $project)}} " tabindex="0" class="dropdown-item active">
                        Tasks
                    </a>                   
                    <button type="button" tabindex="0" class="dropdown-item">
                        Files
                    </button>     
                    <button type="button" tabindex="0" class="dropdown-item">
                        Meetings
                    </button>     
                    <button type="button" tabindex="0" class="dropdown-item">
                        References
                    </button>
                    <button type="button" tabindex="0" class="dropdown-item">
                        Comments
                    </button>
                    <button type="button" tabindex="0" class="dropdown-item">
                        Inventory
                    </button>     
                    <button type="button" tabindex="0" class="dropdown-item">
                        Reports
                    </button>
                    <a href=" {{route('project.logs', $project)}} " tabindex="0" class="dropdown-item">
                        Logs
                    </a>                   
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold"></i>Active Tasks</div>
            </div>
            <div class="card-body ">
                <div class="scroll-area-md">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($tasks->where('status', '4') as $task)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a href="{{route('task.show',$task)}}">
                                                <b>{{$task->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            {{ $task->start->format('H:i M d, Y') }} to {{$task->end->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold">Approved Tasks</div>
            </div>
            <div class="card-body">
                <div class="scroll-area-md">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($tasks->where('status', '3') as $task)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a href="{{route('task.show',$task)}}">
                                                <b>{{$task->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            {{ $task->start->format('H:i M d, Y') }} to {{$task->end->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold">Pending Tasks</div>
                {{-- <div class="btn-actions-pane-right text-capitalize actions-icon-btn">                                            
                    <button class="btn btn-primary"  data-toggle="modal" data-target=".addTaskProject">Add Task</button>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="scroll-area-sm">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($tasks->where('status', '2') as $task)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a href="{{route('task.show',$task)}}">
                                                <b>{{$task->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            {{ $task->start->format('H:i M d, Y') }} to {{$task->end->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold">Completed Tasks</div>
            </div>
            <div class="card-body">
                <div class="scroll-area-sm">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($tasks->where('status', '5') as $task)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a href="{{route('task.show',$task)}}">
                                                <b>{{$task->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            {{ $task->start->format('H:i M d, Y') }} to {{$task->end->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
</div>
@endsection