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
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-eye fa-w-20"></i>
                    </span>
                    View
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(111px, 33px, 0px);">
                    @can('manage-project', $project)
                    <a href=" {{route('project.show', $project)}} " tabindex="0" class="dropdown-item active">
                        Summary
                    </a>     
                    <button type="button" tabindex="0" class="dropdown-item">
                        Gantt Chart
                    </button>    
                    <a href=" {{route('project.tasks', $project)}} " tabindex="0" class="dropdown-item">
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
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-tools fa-w-20"></i>
                    </span>
                    Actions
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(111px, 33px, 0px);">
                    @can('manage-projects')
                        <a class="dropdown-item" href="{{ route('project.edit', $project)}}">
                            Edit Project
                        </a>
                    @elsecan('manage-project', $project)
                        <a class="dropdown-item" href="{{ route('project.edit', $project)}}">
                            Edit Project
                        </a>
                    @endcan
                    @can('manage-project', $project)
                        <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target=".addTaskProject">
                            Add Task
                        </button>     
                        <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target=".addReferenceProject">
                            Add Reference
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target=".addMeetingProject">
                            Add Meeting
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target=".addFileProject">
                            Add File
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
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
                            <h6><b>Project Output:</b></h6>
                            {!!$project->output!!}
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
                            <hr>
                            <h6><b>Funding Agency:</b></h6>
                            @if ($project->agency_id != '')
                                {{$project->funding->name}}
                            @else
                                Not Available
                            @endif
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
                @can('manage-projects', $project)
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
                                                <a href="{{route('user.show', $user)}}">{{$user->name}}</a>
                                            </div>
                                            <div class="widget-subheading">
                                                {{$user->pivot->type}}
                                            </div>
                                        </div>

                                        @can('manage-projects')
                                            @if ($project->user_id == $user->id)
                                                    
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-dark" disabled>
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            @else
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-danger" onclick="deleteUserProject({{$user->id}})">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            @endif
                                        @endcan
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

        
        $('#meeting_start').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true,
            pickSeconds: false
        });
        $('#meeting_end').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true,
            pickSeconds: false
        });
        $("#meeting_start").on("change.datetimepicker", function (e) {
            $('#meeting_end').datetimepicker('minDate', e.date);
        });
        $("#meeting_end").on("change.datetimepicker", function (e) {
            $('#meeting_start').datetimepicker('maxDate', e.date);
        });
        
        $('#recurring_time').datetimepicker({
            format:'HH:mm',
            ignoreReadonly: true,
            pickSeconds: false
        });
    });

    CKEDITOR.replace( 'task_desc' );
    CKEDITOR.replace( 'task_deliverable' );
    CKEDITOR.replace( 'task_resources' );

    CKEDITOR.replace( 'meeting_agenda' );
    $(document).ready(function () 
    {
        
        if (window.location.hash != '') {
            $("#tab-summary-link").removeClass('active');
            $('div#tab-summary').removeClass('active');
            $(window.location.hash+'-link').addClass('active');
            $('div'+window.location.hash).addClass('show active');
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
    function deleteUserProject(value) {
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
                    else
                    {
                        alert(response)
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

<div class="modal fade addTaskProject" tabindex="-1" role="dialog" aria-labelledby="addTaskProject" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('task.store')}}" method="post" class="">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="scrollbar-container ps ps--active-y">
                    @csrf
                    <input name="project_id" type="hidden" value="{{$project->id}}">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="name" class="">Task Name</label>
                                <input name="name" placeholder="Task Name" type="text" value="{{old('name')}}"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="start" class="">Task Start</label>
                                <div class="input-group date" id="start" data-target-input="nearest">
                                    <input type="text" name="start" class="form-control datetimepicker-input" value="{{old('start')}}" data-toggle="datetimepicker"  data-target="#start" readonly/>
                                    <div class="input-group-append" data-target="#start" data-toggle="datetimepicker" >
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="end" class="">Task End</label>
                                <div class="input-group date" id="end" data-target-input="nearest">
                                    <input type="text" name="end" class="form-control datetimepicker-input" value="{{old('end')}}" data-toggle="datetimepicker"  data-target="#end" readonly/>
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
                                <textarea name="description" id="task_desc" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="task_deliverable" class="">Task Deliverable</label>
                                <textarea name="deliverable" id="task_deliverable" class="form-control">{{old('deliverable')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="task_resources" class="">Task Resources</label>
                                <textarea name="resources" id="task_resources" class="form-control">{{old('resources')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
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

<div class="modal fade addMeetingProject" tabindex="-1" role="dialog" aria-labelledby="addMeetingProject" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('meeting.store')}}" method="post" class="">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="scrollbar-container ps ps--active-y">
                    @csrf
                    <input name="project_id" type="hidden" value="{{$project->id}}">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="name" class="">Meeting Name</label>
                                <input name="name" placeholder="Meeting Name" type="text" value="{{old('name')}}"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="link" class="">Meeting Link</label>
                                <input name="link" id="link" placeholder="Meeting Link" type="text" value="{{old('link')}}"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="location" class="">Meeting Location</label>
                                <input name="location" id="location" placeholder="Meeting Location" type="text" value="{{old('location')}}"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="start" class="">Meeting Start Date and Time</label>
                                <div class="input-group date" id="meeting_start" data-target-input="nearest">
                                    <input type="text" name="meeting_start" class="form-control datetimepicker-input" value="{{old('meeting_start')}}" data-toggle="datetimepicker"  data-target="#meeting_start" readonly/>
                                    <div class="input-group-append" data-target="#meeting_start" data-toggle="datetimepicker" >
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="end" class="">Meeting End Date and Time</label>
                                <div class="input-group date" id="meeting_end" data-target-input="nearest">
                                    <input type="text" name="meeting_end" class="form-control datetimepicker-input" value="{{old('meeting_end')}}" data-toggle="datetimepicker"  data-target="#meeting_end" readonly/>
                                    <div class="input-group-append" data-target="#meeting_end" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="check_recurring" id="check_recurring" onclick="showRecurring()"> Recurring?
                                </label>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div id="display_recurring" style="display:none">
                        <div class="form-row" >
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="recurring_day" class="">Recurring Day</label>
                                    <select class="custom-select" name="recurring_day" id="recurring_day">
                                        <option value="None">None</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="end" class="">Recurring Time</label>
                                    <div class="input-group date" id="recurring_time" data-target-input="nearest">
                                        <input type="text" name="recurring_time" class="form-control datetimepicker-input" value="{{old('recurring_time')}}" data-toggle="datetimepicker"  data-target="#recurring_time" readonly/>
                                        <div class="input-group-append" data-target="#recurring_time" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="agenda" class="">Meeting Agenda</label>
                                <textarea name="agenda" id="meeting_agenda" class="form-control">{{old('agenda')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            
            <script>
                function showRecurring () {
                    var checkBox = document.getElementById("check_recurring");
                    var display_recurring = document.getElementById("display_recurring");
                    if (checkBox.checked == true){
                        display_recurring.style.display = "block";
                    } else {
                        display_recurring.style.display = "none";
                    }
                }
            </script>

        </div>
    </div>
</div>

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
                                    <input name="name" placeholder="Reference Name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="link" class="">Reference Link</label>
                                    <input name="link" placeholder="Reference Link" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="notes" class="">Reference Notes</label>
                                    <textarea name="notes" placeholder="Reference Notes" class="form-control" rows="5"></textarea>
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

<div class="modal fade addFileProject" tabindex="-1" role="dialog" aria-labelledby="addFileProject" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('projects.addFileProject', $project)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add File</h5>
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
                                    <label for="name" class="">File Name</label>
                                    <input name="name" placeholder="File Name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Upload File?  </label>
                                    Yes <input type="radio" onclick="fileCheck();" name="yesno" id="yesCheck" checked> 
                                    No <input type="radio" onclick="fileCheck();" name="yesno" id="noCheck">
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function fileCheck() {
                                if (document.getElementById('yesCheck').checked) 
                                {
                                    document.getElementById('file-upload').style.display = 'block';
                                    document.getElementById('file-link').style.display = 'none';
                                }
                                else 
                                {
                                    document.getElementById('file-link').style.display = 'block';
                                    document.getElementById('file-upload').style.display = 'none';
                                }
                            
                            }
                        </script>
                    </div>    
                    <div class="col-md-12" id="file-link" style="display:none">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="link" class="">File Link</label>
                                    <input name="link" placeholder="File Link" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12" id="file-upload">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="file" class="">File Upload</label>
                                    <input name="file" type="file" class="form-control-file">
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="">File Description</label>
                                    <textarea name="description" id="file_description" placeholder="File Description" class="form-control" rows="5"></textarea>
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