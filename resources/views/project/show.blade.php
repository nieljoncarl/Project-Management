@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-book icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>{{ $project->name}}</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('project.edit', $project)}}">
                <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Edit Project">
                    <i class="fa fa-edit"></i>
                </button>
            </a>
            {{-- <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(111px, 33px, 0px);">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled="" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
    
</div>    
@endsection
@section('content')
    <div class="mb-3 card">
        <div class="card-header">
            <ul class="nav nav-justified">
                <li class="nav-item"><a data-toggle="tab" id="tab-summary-link" href="#tab-summary" class="nav-link show active">Summary</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-gantt" class="nav-link">Gantt</a></li>
                <li class="nav-item"><a data-toggle="tab" id="tab-task-link" href="#tab-task" class="nav-link">Task</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-files" class="nav-link">Files</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-meetings" class="nav-link">Meetings</a></li>
                <li class="nav-item"><a data-toggle="tab" id="tab-references-link" href="#tab-references" class="nav-link">References and Comments</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-logs" class="nav-link">Logs</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="tab-summary" role="tabpanel">
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <div class="main-card mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title">Project Information</div>
                                </div>
                                <div class="card-body">
                                    <div class="scroll-area-lg">
                                        <div class="row">
                                            <div class="col-md-8 mb-4">
                                                <h6><b>Project Description: </b></h6>
                                                {!!$project->description!!}
                                                <hr>
                                                <h6><b>Project Outcomes:</b></h6>
                                                {!!$project->outcomes!!}
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <h6><b>Project Duration:</b></h6>
                                                {{$project->start}} - {{$project->end}}
                                                <hr>
                                                <h6><b>Project Created:</b></h6>
                                                {{$project->created_at}}
                                                <hr>
                                                <h6><b>Project Created By:</b></h6>
                                                {{$project->user->name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title">Project Personnel</div>
                                    @can('manage-project', $project)
                                    <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                        <div class="btn-group dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn-icon btn-icon-only btn btn-link">
                                                <i class="fa fa-plus fa-2x btn-icon-wrapper"></i>
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-212px, 36px, 0px);">
                                                <h6 tabindex="-1" class="dropdown-header">Search Person</h6>
                                                <form class="dropdown-header" action="">
                                                    <div class="form-group">
                                                    <label for=""></label>
                                                    <input type="text" class="form-control" name="user_search" id="user_search" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </div>
                                <div class="card-body">
                                    <div class="scroll-area-lg scrollhere">
                                        <div class="scrollbar-container ps ps--active-y">
                                            <ul class="todo-list-wrapper list-group list-group-flush">
                                                @foreach ($project->users()->get() as $user)
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="40" class="rounded-circle" src="{{$user->avatar}}" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">
                                                                    {{$user->name}}
                                                                </div>
                                                                <div class="widget-subheading">
                                                                    {{$user->pivot->type}}
                                                                </div>
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
                </div>
                <div class="tab-pane" id="tab-gantt" role="tabpanel">
                    
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-body">
                                    <div class="scroll-area-xl" style="width: 100%;">
                                        <div class="scrollbar-container ps ps--active-y">
                                            <div id="container" width="100%" height="80%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-task" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7">
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title text-capitalize font-weight-bold"><i class="header-icon fa fa-tasks"> </i>TASKLIST</div>
                                </div>
                                <div class="card-body ">
                                    <div class="scroll-area-lg">
                                        <div class="scrollbar-container ps ps--active-y">
                                            <ul class="todo-list-wrapper list-group list-group-flush ">
                                                @foreach ($tasks as $task)
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">{{$task->name}}
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
                                                                                            </div>
                                                                <div class="widget-subheading">{{implode(', ',$task->users()->get()->pluck('name')->toArray())}} </div>
                                                                <div class="widget-subheading"><i>{{$task->start}} - {{$task->end}}</i></div>
                                                            </div>
                                                            <div class="widget-content-right widget-content-actions">
                                                                <a href="{{route('task.show',$task)}}"><button class="border-0 btn-transition btn btn-outline-primary">
                                                                    <i class="fa fa-eye"></i>
                                                                </button></a>
                                                                <a href="http://"><button class="border-0 btn-transition btn btn-outline-primary">
                                                                    <i class="fa fa-play-circle"></i>
                                                                </button></a>
                                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </button>
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
                        <div class="col-sm-12 col-lg-5">
                            <form action="{{ route('task.store')}}" method="post" class="">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title text-capitalize font-weight-normal"><i class="header-icon fa fa-edit "> </i>CREATE TASK</div>
                                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">                                            
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="scroll-area-lg">
                                            <div class="scrollbar-container ps ps--active-y">
                                                @csrf
                                                <input name="project_id" type="hidden" value="{{$project->id}}">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="name" class="">Task Name</label>
                                                            <input name="name" id="name" placeholder="Task Name" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="start" class="">Project Start</label>
                                                            <div class="input-group date" id="start" data-target-input="nearest">
                                                                <input type="text" name="start" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start" readonly/>
                                                                <div class="input-group-append" data-target="#start" data-toggle="datetimepicker" >
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="end" class="">Project End</label>
                                                            <div class="input-group date" id="end" data-target-input="nearest">
                                                                <input type="text" name="end" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end" readonly/>
                                                                <div class="input-group-append" data-target="#end" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="task_desc" class="">Task Description</label>
                                                            <textarea name="description" id="task_desc" value="  " class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-files" role="tabpanel">
                </div>
                <div class="tab-pane" id="tab-meetings" role="tabpanel">
                </div>
                <div class="tab-pane" id="tab-references" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title">References</div>
                                    <div class="btn-actions-pane-right text-capitalize actions-icon-btn">                      
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".addReferenceProject">
                                            Add New
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="scroll-area-xl scrollhere">
                                        <div class="scrollbar-container ps ps--active-y">
                                            <ul class="todo-list-wrapper list-group list-group-flush">
                                                @foreach ($project->references()->get() as $reference)
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="40" class="rounded-circle" src="{{$reference->user->avatar}}" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">
                                                                    {{$reference->user->name}}
                                                                </div>
                                                                <div class="widget-subheading">
                                                                    {{$reference->name}} - {{$reference->created_at}}
                                                                </div>
                                                                <div class="widget-body">
                                                                    <a href="//{{$reference->body}}">{{$reference->body}}</a>
                                                                </div>
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
                        <div class="col-md-6 mb-4">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title">Comments</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="scroll-area-lg scrollhere">
                                            <div class="scrollbar-container ps ps--active-y">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input name="body" id="body" placeholder="Comment" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-logs" role="tabpanel">
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

            </div>
        </div>
    </div>



@endsection

@section('scripts')

{{-- Tabs --}}
<script type="text/javascript">
    $(function () {
        $('#start').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true,
            pickSeconds: false
        });
        $('#end').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true,
            pickSeconds: false
        });
        $("#start").on("change.datetimepicker", function (e) {
            $('#end').datetimepicker('minDate', e.date);
        });
        $("#end").on("change.datetimepicker", function (e) {
            $('#start').datetimepicker('maxDate', e.date);
        });
    });

    CKEDITOR.replace( 'task_desc' );
    $(document).ready(function () 
    {
        
        if (window.location.hash == '#tab-task') {
            $("#tab-summary-link").removeClass('active');
            $('div#tab-summary').removeClass('active');
            $('#tab-task-link').addClass('active');
            $('div#tab-task').addClass('show active');
        }
        else if(window.location.hash == '#tab-references')
        {
            $("#tab-summary-link").removeClass('active');
            $('div#tab-summary').removeClass('active');
            $('#tab-references-link').addClass('active');
            $('div#tab-references').addClass('show active');
        }
    });

</script>

{{-- Queries --}}
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var projectid = {{$project->id}}
    $(document).ready(function(){

        $( "#user_search" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
            url:"{{route('users.getUsers')}}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term,
            },
            success: function( data ) {
                response( data );
            }
            });
        },
        select: function (event, ui) {
            insert(ui.item.value);
        }
        });

        function insert(value) {
            $.ajax({
                url:"{{ route('users.addUserProject')}}",
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    user: value,
                    projectid: projectid
                    },
                success: function(response)
                {
                    if(response=="1")
                    {
                        Swal.fire({
                            title: 'Already Assigned',
                            icon: 'warning',
                            }).then((result) => {
                            if (result.value) {
                                $('#user_search').val('');
                            }
                        })
                    }
                    else if(response=="2")
                    {
                        Swal.fire({
                            title: 'User Added',
                            icon: 'success',
                            }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        })
                    }
                }

            });
        }

    });
    function deleteUserTask(value) {
            $.ajax({
                url:"{{ route('users.deleteUserProject')}}",
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    user: value,
                    projectid: projectid
                    },
                success: function(response)
                {
                    if(response=="1")
                    {
                        Swal.fire({
                            title: 'User Removed',
                            icon: 'success',
                            }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        })
                    }
                }

            });
        }
</script>
{{-- HighCharts --}}
<script>
    var today = new Date(),
        day = 1000 * 60 * 60 * 24,
        dateFormat = Highcharts.dateFormat,
        defined = Highcharts.defined,
        isObject = Highcharts.isObject,
        reduce = Highcharts.reduce;
    
    today.setUTCHours(8);
    today.setUTCMinutes(0);
    today.setUTCSeconds(0);
    today.setUTCMilliseconds(0);
    today = today.getTime();
    var assigned = '';
    Highcharts.ganttChart('container', {
            xAxis: {
            currentDateIndicator: true,
            min: today - 3 * day,
            max: today + 18 * day
            },
            yAxis: {
                uniqueNames: true,
            },
            navigator: {
                enabled: true,
                liveRedraw: true,
                series: {
                    type: 'gantt',
                    pointPlacement: 0.3,
                    pointPadding: 0.1
                },
                yAxis: {
                    min: 0,
                    max: 3,
                    reversed: true,
                    categories: []
                }
            },
            rangeSelector: {
                enabled: true,
                selected: 1
            },
    
            series: [{
            name: '{{$project->alias}}',
            data: [
                    @foreach($tasks as $task)
                    {
    
                    name: '<a href="{{route("task.show", $task->id)}}">{{$task->name}}</a>',
                    id: '{{$task->id}}',
                    start: (new Date("{{$task->start}}")).getTime(),
                    end: (new Date("{{$task->end}}")).getTime(),
                    completed: {
                        amount: @if ($task->status==1)
                                    '0'
                                @elseif($task->status==2)
                                    '1'
                                @elseif($task->status==3)
                                    '10'
                                @elseif($task->status==4)
                                    '50'
                                @elseif($task->status==5)
                                    '100'
                                @endif /100,
                        fill: '#00aa00'
                    },
                    owner:  '{{implode(', ',$task->users()->get()->pluck('name')->toArray())}}',

                    color: @if ($task->status==1)
                                '#000000'
                            @elseif($task->status==2)
                                '#16aaff'
                            @elseif($task->status==3)
                                '#f7b924'
                            @elseif($task->status==4)
                                '#3f6ad8'
                            @elseif($task->status==5)
                                '#3ac47d'
                            @endif
                            },
                    @endforeach
                ]},
        ],
            plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                    window.location = '/task/'+this.options.id;
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },
        
        tooltip: {
            style: {
                pointerEvents: 'auto'
            },
            pointFormatter: function () {
                var point = this,
                    format = '%b-%d-%Y %H:%m', //'%e. %b',
                    options = point.options,
                    completed = options.completed,
                    amount = isObject(completed) ? completed.amount : completed,
                    status = ((amount || 0) * 100) + '%',
                    lines;
    
                lines = [{
                    value: point.name,
                    style: 'font-weight: bold;'
                }, {
                    title: 'Start',
                    value: dateFormat(format, point.start)
                }, {
                    visible: !options.milestone,
                    title: 'End',
                    value: dateFormat(format, point.end)
                }, {
                    title: 'Completed',
                    value: status
                }, {
                    title: 'Resource',
                    value: options.owner || 'unassigned'
                }];
    
                return reduce(lines, function (str, line) {
                    var s = '',
                        style = (
                            defined(line.style) ? line.style : 'font-size: 1em;'
                        );
                    if (line.visible !== false) {
                        s = (
                            '<span style="' + style + '">' +
                            (defined(line.title) ? line.title + ': ' : '') +
                            (defined(line.value) ? line.value : '') +
                            '</span><br/>'
                        );
                    }
                    return str + s;
                }, '');
            }
        },
        title: {
            text: '{{$project->name}}'
        },
        subtitle: {
            text: '{{$project->alias}}'
        },
        chart:{
            scrollablePlotArea: {
            minHeight: 100,
            scrollPositionY: 0
            }
        }
    });
</script>
@endsection

@section('modals')

<div class="modal fade addReferenceProject" tabindex="-1" role="dialog" aria-labelledby="addReferenceProject" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('projects.addReferenceProject', $project)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Reference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Reference Name</label>
                                    <input name="name" id="name" placeholder="Reference Name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="body" class="">Reference Link</label>
                                    <input name="body" id="body" placeholder="Reference Link" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection