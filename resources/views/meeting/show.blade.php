@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-tasks icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>{{$meeting->name}}</div>
        </div>
        <div class="page-title-actions">
            <div class="form-group">    
                @can('manage-project', $meeting)
                    @if($meeting->status=="3")
                    <form action="{{ route('meeting.update', $meeting)}}" class="d-inline-block" method="post">
                        @csrf
                        <input name="status" type="hidden" value="4">
                        {{ method_field('PUT')}}
                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary" data-toggle="tooltip" data-original-title="Start Meeting"><i class="fa fa-play-circle" aria-hidden="true"></i></button>
                    </form> 
                    @elseif($meeting->status=="4")
                    <form action="{{ route('meeting.update', $meeting)}}" class="d-inline-block" method="post">
                        @csrf
                        <input name="status" type="hidden" value="5">
                        {{ method_field('PUT')}}
                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary" data-toggle="tooltip" data-original-title="Complete Meeting"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                    @endif
                @endcan
                @can('manage-projects', $meeting)
                    @if($meeting->status=="2")
                    <form action="{{ route('meeting.update', $meeting)}}" class="d-inline-block" method="post">
                        @csrf
                        <input name="status" type="hidden" value="3">
                        {{ method_field('PUT')}}
                        <button type="submit" class="border-0 btn-transition btn btn-primary" data-toggle="tooltip" data-original-title="Approve Meeting"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                    </form>
                    @endif
                @endcan
                <a href="{{ route('meeting.edit', $meeting)}}" class="d-inline-block">
                    <button type="button" data-toggle="tooltip" title="" class="border-0 btn-transition btn btn-outline-primary" data-original-title="Edit Meeting">
                        <i class="fa fa-edit"></i>
                    </button>
                </a>
            </div>
        </div>       
    </div>
</div>      
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Meeting Information</div>
                        </div>
                        <div class="card-body">
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <div><b>Project: <a href="{{route('project.show', $meeting->project_id)}}">{{$meeting->project->name}}</a></b></div>
                                    <div>
                                        <b>Meeting Status: </b>
                                        @if($meeting->status=="1")
                                            <div class="badge badge-default">Proposal</div>
                                        @elseif($meeting->status=="2")
                                            <div class="badge badge-info">Pending</div>    
                                        @elseif($meeting->status=="3")
                                            <div class="badge badge-warning">Approved</div>    
                                        @elseif($meeting->status=="4")
                                            <div class="badge badge-primary">In Progress</div>     
                                        @elseif($meeting->status=="5")
                                            <div class="badge badge-success">Completed</div>   
                                        @endif
                                    </div>
                                    @if ($meeting->start != '')
                                        <div><b>Meeting Start Date: </b>{{$meeting->start->format('H:i M d, Y')}}</div>
                                        <div><b>Meeting End Date: </b>{{ $meeting->end->format('H:i M d, Y')}}</div>
                                    @endif
                                    @if ($meeting->recurring_day != 'None')
                                        <div><b>Recurring Every: </b> {{$meeting->recurring_day}} - {{$meeting->recurring_time}}</div>
                                    @endif
                                    @if ($meeting->started != '')
                                        <div data-toggle="tooltip" data-original-title="{{$meeting->started}}"><b>Date Started: </b>
                                                {{$meeting->started->diffForHumans()}}
                                        </div>
                                    @endif
                                    @if ($meeting->ended != '')
                                    <div data-toggle="tooltip" data-original-title="{{$meeting->ended}}"><b>Date Finished: </b>
                                            {{$meeting->ended->diffForHumans()}}
                                    </div>
                                    @endif
                                    @if ($meeting->link != '')
                                        <div><b>Meeting Link: </b><a href="{{$meeting->link}}" target="_blank">Open in New Tab</a></div>
                                    @endif

                                    @if ($meeting->location != '')
                                        <div><b>Meeting Location: </b> {{$meeting->location}} <a href="https://www.google.com/maps/search/?api=1&query={{$meeting->location}}" target="_blank"> <i class="fa fa-map"></i> </a></div>
                                    @endif
                                    
                                    <hr>
                                    
                                    <div><b>Created By: </b><a href="{{route('user.show', $meeting->user)}}">{{$meeting->user->name}}</a></div>
                                    <div data-toggle="tooltip" data-original-title="{{$meeting->created_at->format('H:i M d, Y')}}"><b>Date Created: </b>
                                            {{$meeting->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Logs</div>
                        </div>
                        <div class="card-body">
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        @foreach ($logs as $log)
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="40" class="rounded-circle" src="{{$log->causer->avatar}}" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            {{$log->causer->name}} {{$log->description}} 
                                                            @if ($log->description == 'updated')
                                                                the
                                                                @php
                                                                    $count = 1
                                                                @endphp
                                                                @foreach ($log->properties['attributes'] as $key => $value)
                                                                
                                                                    @if ($key == 'status')
                                                                        {{ $key }} to 
                                                                        {{-- <div> --}}
                                                                            {{-- New {{ $key }}:  --}}
                                                                            @if($value=="1")
                                                                                <div class="badge badge-default">Proposal</div>
                                                                            @elseif($value=="2")
                                                                                <div class="badge badge-info">Pending</div>    
                                                                            @elseif($value=="3")
                                                                                <div class="badge badge-warning">Approved</div>    
                                                                            @elseif($value=="4")
                                                                                <div class="badge badge-primary">In Progress</div>     
                                                                            @elseif($value=="5")
                                                                                <div class="badge badge-success">Completed</div>   
                                                                            @endif
                                                                        {{-- </div>
                                                                        <div>Original {{ $key }}:  --}}
                                                                            from 
                                                                            @if($log->properties['old'][$key]=="1")
                                                                                <div class="badge badge-default">Proposal</div>
                                                                            @elseif($log->properties['old'][$key]=="2")
                                                                                <div class="badge badge-info">Pending</div>    
                                                                            @elseif($log->properties['old'][$key]=="3")
                                                                                <div class="badge badge-warning">Approved</div>    
                                                                            @elseif($log->properties['old'][$key]=="4")
                                                                                <div class="badge badge-primary">In Progress</div>     
                                                                            @elseif($log->properties['old'][$key]=="5")
                                                                                <div class="badge badge-success">Completed</div>   
                                                                            @endif  
                                                                        {{-- </div> --}}
                                                                        
                                                                    @elseif ($key == 'description')
                                                                    {{ $key }}.
                                                                        
                                                                    @elseif ($key == 'deliverable')
                                                                    {{ $key }}.
                                                                        
                                                                    @elseif ($key == 'resources')
                                                                    {{ $key }}.
                                                                    @else
                                                                        
                                                                    {{ $key }} to {{ $value }} from {{ $log->properties['old'][$key]}}
                                                                        {{-- <div>New {{ $key }}: {{ $value }}</div>
                                                                        <div>Original {{ $key }}: {{ $log->properties['old'][$key] }}                                                                 --}}
                                                                    @endif
                                                                    @if(count($log->properties['attributes']) > $count)
                                                                    ,
                                                                    @endif
                                                                    @php
                                                                        $count++;
                                                                    @endphp
                                                                @endforeach
                                                            @else
                                                            this meeting.
                                                            @endif
                                                        </div>
                                                        <div class="widget-subheading">
                                                            {{$log->created_at->format('H:i M d, Y')}}
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

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-7">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Meeting Agenda</div>
                            <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="scroll-area-sm">
                                {!!$meeting->agenda!!}
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-5">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Meeting Personnel</div>
                            
                            @can('manage-meeting', $meeting)
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
                            @elsecan('manage-tasks', $meeting)
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
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        @foreach ($meeting->users()->get() as $user)
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="40" class="rounded-circle" src="{{$user->avatar}}" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading" >
                                                            <a data-toggle="tooltip" data-original-title="{{$user->pivot->guest_status}}" href="{{route('user.show', $user)}}">{{$user->name}}</a>
                                                        </div>
                                                    </div>
                                                    
                                                    @can('manage-meeting', $meeting)
                                                    @if ($meeting->user_id == $user->id)
                                                        <div class="widget-content-right widget-content-actions">
                                                            <button class="border-0 btn-transition btn btn-outline-dark" disabled>
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="widget-content-right widget-content-actions">
                                                            <button class="border-0 btn-transition btn btn-outline-danger" onclick="deleteUserMeeting({{$user->id}})">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">Minutes of the Meeting</div>
                            <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="scroll-area-sm">
                                {!!$meeting->minutes!!}
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var meetingid = {{ $meeting->id }};
        var projectid = {{$meeting->project_id}}
        $(document).ready(function(){

            $( "#user_search" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                url:"{{route('users.getUserProject')}}",
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term,
                    projectid: projectid,
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
                    url:"{{ route('users.addUserMeeting')}}",
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        user: value,
                        meetingid: meetingid
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
        function deleteUserMeeting(value) {
                $.ajax({
                    url:"{{ route('users.deleteUserMeeting')}}",
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        user: value,
                        meetingid: meetingid
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
@endsection