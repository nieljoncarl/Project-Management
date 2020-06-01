@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Modify: {{$task->name}}</div>
        </div>
    </div>
</div>      
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <form action="{{ route('task.update', $task)}}" method="post" class="">
                <div class="main-card mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">Task New Information</div>
                    </div>
                    <div class="card-body">
                        <div class="scrollbar-container ps ps--active-y">
                            @csrf
                            @method('PUT')
                            {{-- <input name="project_id" type="hidden" value="{{$project->id}}"> --}}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Task Name</label>
                                        <input name="name" id="name" placeholder="Task Name" value="{{$task->name}}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="start" class="">Project Start</label>
                                        <div class="input-group date" id="start" data-target-input="nearest">
                                            <input type="text" name="start" class="form-control datetimepicker-input" data-toggle="datetimepicker" value="{{$task->start}}" data-target="#start" readonly/>
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
                                            <input type="text" name="end" class="form-control datetimepicker-input" data-toggle="datetimepicker" value="{{$task->end}}" data-target="#end" readonly/>
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
                                        <textarea name="description" id="task_desc" class="form-control">
                                            {!!$task->description!!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="task_deliverable" class="">Task Deliverable</label>
                                        <textarea name="deliverable" id="task_deliverable" value="  " class="form-control">
                                            {!!$task->deliverable!!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="task_resources" class="">Task Resources</label>
                                        <textarea name="resources" id="task_resources" value="  " class="form-control">
                                            {!!$task->resources!!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                            <button class="btn btn-success">Save</button>
                            
                        </div>
                    </div>  
                </div>
            </form>
        </div>
        <div class="col-md-6 mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Task Current Information</div>
                        </div>
                        <div class="card-body">
                            <div class="scroll-area-sm">
                                <div><b>Project: <a href="{{route('project.show', $task->project_id)}}">{{$task->project->name}}</a></b></div>
                                <div>
                                    <b>Task Status: </b>
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
                                <div><b>Task Start Date: </b>{{$task->start}}</div>
                                <div><b>Task End Date: </b>{{$task->end}}</div>
                                <div><b>Date Started: </b>{{$task->started}}</div>
                                <div><b>Date Finished: </b>{{$task->ended}}</div>
                                
                                <hr>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <img width="40" class="rounded-circle" src="{{$task->user->avatar}}" alt="">
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                {{$task->user->name}}
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
    </div>
@endsection
@section('scripts')

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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var taskid = {{ $task->id }};
        $(document).ready(function(){
            CKEDITOR.replace( 'task_desc' );
            CKEDITOR.replace( 'task_deliverable' );
            CKEDITOR.replace( 'task_resources' );
            $( "#user_search" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                url:"{{route('users.getUsers')}}",
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function( data ) {
                    response( data );
                }
                });
            },
            select: function (event, ui) {
                $('user_search').val(ui.item.name);
                insert(ui.item.value);



            }
            });

            function insert(value) {
                $.ajax({
                    url:"{{ route('users.addUserTask')}}",
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        user: value,
                        taskid: taskid
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

    </script>
@endsection