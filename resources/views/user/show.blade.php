@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <img width="32" class="rounded-circle" src="{{$user->avatar}}" alt="">
            </div>
            <div>{{ $user->name}}</div>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card" style="width: 100%;">
            <img class="card-img-top" src="{{$user->avatar}}" alt="User Photo">
            <div class="card-body text-center">
              <p class="card-text"> <a href="mailto:{{ $user->email}}">{{ $user->email}}</a></p>
              <p class="card-text"> <a href="tel:{{ $user->contact_no}}">{{ $user->contact_no}}</a></p>
              <p class="card-text"> <a target="__blank" href="https://www.google.com/maps/search/?api=1&query={{ $user->address}}"> {{ $user->address}} </a></p>
            </div>
          </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="main-card mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">Projects</div>
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                @foreach ($user->projects()->get() as $project)
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                {{-- <img width="42" class="rounded-circle" src="assets/images/avatars/5.jpg" alt=""> --}}
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">{{$project->alias}}</div>
                                                <div class="widget-subheading">{{$project->pivot->type}}</div>
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
            
            <div class="col-md-6 mb-4">
                <div class="main-card mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">Files</div>
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-sm">

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        User Tasks
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Task Info</th>
                                        <th class="text-center">Project</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <div class="table-responsive">
                                        <tbody>
                                            @foreach ($user->tasks()->get() as $task)
                                            
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$task->name}}</div>
                                                                <div class="widget-subheading opacity-7">{{$task->start}} - {{$task->end}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$task->project->name}}</td>
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
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        

        </div>
    </div>
    {{-- <div class="col-md-3 col-lg-3">
        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Income Target</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Income Target</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection