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
                <li class="nav-item"><a data-toggle="tab" href="#tab-summary" class="nav-link show active">Summary</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-gantt" class="nav-link show">Gantt</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-task" class="nav-link show">Task List</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-files" class="nav-link show">Files</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-personel" class="nav-link show">Personel</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-report" class="nav-link show">Report</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="tab-summary" role="tabpanel">
                    
                    <div class="col-sm-12 col-lg-7">
                        <div class="card-hover-shadow-2x mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Project Information</div>
                            </div>
                            <div class="card-body">
                                <div class="scroll-area-lg">
                                    <div class="p-2">
                                        <h6>Project Duration: {{$project->start}} - {{$project->end}}</h6>
                                        <h5>Project Desciption: {{$project->description}}</h5>
                                        <h5>Project Outcomes: {{$project->outcomes}}</h5>
                                    </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show" id="tab-gantt" role="tabpanel">
                    No Gantt
                </div>
                <div class="tab-pane show" id="tab-task" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7">
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon fa fa-tasks"> </i>Tasks List</div>
                                </div>
                                <div class="card-body">
                                    <div class="scroll-area-xl">
                                        <div class="p-2">
                                            <ul class="todo-list-wrapper list-group list-group-flush">
                                                @foreach ($project->tasks()->orderBy('start', 'asc')->get() as $task)
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">{{$task->name}}
                                                                    <div class="badge badge-primary ml-2">
                                                                        {{$task->status}}
                                                                    </div>
                                                                </div>
                                                                <div class="widget-subheading"><i>User Involve - {{$task->start}} - {{$task->end}}</i></div>
                                                            </div>
                                                            <div class="widget-content-right widget-content-actions">
                                                                <a href="http://"><button class="border-0 btn-transition btn btn-outline-primary">
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
                            <div class="card-hover-shadow-2x mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon fa fa-edit "> </i>Create Task</div>
                                </div>
                                <div class="card-body">
                                    <div class="scroll-area-xl">
                                        <form action="{{ route('task.store')}}" method="post" class="">
                                            @csrf
                                            <input name="project_id" type="hidden" value="{{$project->id}}">
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="">Task Name</label>
                                                        <input name="name" id="name" placeholder="Task Name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="status" class="">Task Status</label>
                                                        <select name="status" id="status" class="custom-select">
                                                            <option value="Not Started">Not Started</option>
                                                            <option value="In Progress">In Progress</option>
                                                            <option value="Finished">Finished</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="task_desc" class="">Task Description</label>
                                                        <textarea name="description" id="task_desc" value="  " class="form-control" rows="5"></textarea>
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
                                            <div class="row justify-content-center">
                                                <button class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show" id="tab-files" role="tabpanel">
                    <div class="col-sm-12 col-lg-7">
                        <div class="card-hover-shadow-2x mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Project Information</div>
                            </div>
                            <div class="card-body">
                                <div class="scroll-area-lg">
                                    <div class="p-2">
                                        <h6>Project Duration: {{$project->start}} - {{$project->end}}</h6>
                                        <h5>Project Desciption: {{$project->description}}</h5>
                                        <h5>Project Outcomes: {{$project->outcomes}}</h5>
                                    </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show" id="tab-personel" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h4>Project Personel</h4>
                            <hr>
                            @foreach ($project->users()->get() as $user)
                            <tr>
                                <td width="50%">{{$user->name}}</td>
                                <td width="50%">{{$user->pivot->type}}</td>
                            </tr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane show" id="tab-report" role="tabpanel">
                    <div class="col-sm-12 col-lg-7">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#start').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start").on("change.datetimepicker", function (e) {
            $('#end').datetimepicker('minDate', e.date);
        });
        $("#end").on("change.datetimepicker", function (e) {
            $('#start').datetimepicker('maxDate', e.date);
        });
    });
</script>
@endsection