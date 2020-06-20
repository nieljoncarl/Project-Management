@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Logs: {{$project->name}}</div>
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
                    <button type="button" tabindex="0" class="dropdown-item">
                        Tasks
                    </button>     
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
                    <a href=" {{route('project.logs', $project)}} " tabindex="0" class="dropdown-item {{ Request::is('project/logs/*') ? 'active' : '' }}">
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
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">General Logs</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-xl scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($logs as $log)
                                @if(empty($log->getExtraProperty("taskname")))
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="40" class="rounded-circle" src="{{$log->causer->avatar}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{$log->causer->name}} {{$log->description}} this project.
                                                </div>
                                                <div class="widget-subheading">
                                                    {{$log->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Task Related Logs</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-xl scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($logs as $log)
                                @if(empty($log->getExtraProperty("taskname")))
                                @else
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="40" class="rounded-circle" src="{{$log->causer->avatar}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{$log->causer->name}} {{$log->description}} <a href="{{ route('task.show', $log->getExtraProperty('task_id'))}}">{{$log->getExtraProperty("taskname")}}</a> task on this project.
                                                </div>
                                                <div class="widget-subheading">
                                                    {{$log->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection