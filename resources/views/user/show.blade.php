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
        <div class="card mb-4" style="width: 100%;">
            <img class="card-img-top" src="{{$user->avatar}}" alt="User Photo">
            <div class="card-body text-center">
              <p class="card-text"> <a href="mailto:{{ $user->email}}">{{ $user->email}}</a></p>
              <p class="card-text"> <a href="tel:{{ $user->contact_no}}">{{ $user->contact_no}}</a></p>
              <p class="card-text"> <a target="__blank" href="https://www.google.com/maps/search/?api=1&query={{ $user->address}}"> {{ $user->address}} </a></p>
            </div>
        </div>
        @can('manage-officer')
        <div class="main-card mb-4 card">
            <div class="card-body text-center">
                <h5 class="card-title">
                    Admin Actions
                </h5>
                <hr>
                <button class="mb-2 mr-2 btn btn-dark"  data-toggle="modal" data-target="#generateTask">
                    Generate Task Report
                </button>
                <button class="mb-2 mr-2 btn btn-dark">
                    Generate Log Report
                </button>
            </div>
        </div>
        @endcan
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">Projects</div>
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                            <table class="align-middle mb-0 table table-borderless table-hover">
                                <div class="table-responsive">
                                    <tbody>
                                        @foreach ($user->projects()->get() as $project)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <a href="{{route('project.show', $project)}}"><div class="widget-heading">{{$project->alias}}</div></a>
                                                            <div class="widget-subheading">Role: {{$project->pivot->type}}</div>
                                                        </div>
                                                    </div>
                                                </div>
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
            
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Active Tasks
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-md">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Task Info</th>
                                    <th class="text-center">Project</th>
                                </tr>
                                </thead>
                                <div class="table-responsive">
                                    <tbody>
                                        @foreach ($user->tasks()->where('status', '4')->get() as $task)
                                        
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <a href="{{route('task.show', $task)}}"><div class="widget-heading">{{$task->name}}</div></a>
                                                            <div class="widget-subheading opacity-7">{{$task->start->format('H:i M d, Y')}} - {{$task->end->format('H:i M d, Y')}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$task->project->alias}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Other Tasks
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-md">
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
                                            @foreach ($user->tasks()->where('status', '!=' ,'4')->get() as $task)
                                            
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <a href="{{route('task.show', $task)}}"><div class="widget-heading">{{$task->name}}</div></a>
                                                                <div class="widget-subheading opacity-7">{{$task->start->format('H:i M d, Y')}} - {{$task->end->format('H:i M d, Y')}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$task->project->alias}}</td>
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

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="generateTask" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('report.tasks', $user)}}" method="post" class="" target="_blank">
                    <div class="modal-header">
                        <h5 class="modal-title">Generate Task Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="start2" class="">Date Start</label>
                                        <div class="input-group date" id="start2" data-target-input="nearest">
                                            <input type="text" name="start2" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start2" readonly/>
                                            <div class="input-group-append" data-target="#start2" data-toggle="datetimepicker" >
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="end2" class="">Date End</label>
                                        <div class="input-group date" id="end2" data-target-input="nearest">
                                            <input type="text" name="end2" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end2" readonly/>
                                            <div class="input-group-append" data-target="#end2" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
<script type="text/javascript">
    $(function () {

        $('#start1').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end1').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start1").on("change.datetimepicker", function (e) {
            $('#end1').datetimepicker('minDate', e.date);
        });
        $("#end1").on("change.datetimepicker", function (e) {
            $('#start1').datetimepicker('maxDate', e.date);
        });
        // START2
        $('#start2').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end2').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start2").on("change.datetimepicker", function (e) {
            $('#end2').datetimepicker('minDate', e.date);
        });
        $("#end2").on("change.datetimepicker", function (e) {
            $('#start2').datetimepicker('maxDate', e.date);
        });
        // START3
        $('#start3').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end3').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start3").on("change.datetimepicker", function (e) {
            $('#end3').datetimepicker('minDate', e.date);
        });
        $("#end3").on("change.datetimepicker", function (e) {
            $('#start3').datetimepicker('maxDate', e.date);
        });
    });
</script>
@endsection