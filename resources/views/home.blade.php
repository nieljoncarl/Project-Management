@extends('layouts.main')
@section('content')

{{-- <div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Orders</div>
                        <div class="widget-subheading">Last year expenses</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">1896</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">$3M</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Followers</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">45,9%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Income</div>
                        <div class="widget-subheading">Expected totals</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-focus">$147</div>
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                    </div>
                    <div class="progress-sub-label">
                        <div class="sub-label-left">Expenses</div>
                        <div class="sub-label-right">100%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Orders</div>
                        <div class="widget-subheading">Last year expenses</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">1896</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">$3M</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Followers</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">45,9%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Income</div>
                        <div class="widget-subheading">Expected totals</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-focus">$147</div>
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                    </div>
                    <div class="progress-sub-label">
                        <div class="sub-label-left">Expenses</div>
                        <div class="sub-label-right">100%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Active Projects
            </div>
            <div class="card-body">
                <div class="scroll-area-md">
                    <div class="scrollbar-container ps ps--active-y">
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                {{-- <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th class="text-center">Status</th> 
                                </tr>
                                </thead> --}}
                                <tbody>
                                    @foreach ($user->projects()->where('status', '4')->get() as $project)
                                        <tr>
                                            <td>
                                                <a href="{{route('project.show', $project)}}">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"> {{$project->alias}} </div>
                                                                <div class="widget-subheading opacity-7">{{$project->name}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            {{-- <td class="text-center">
                                                @if($project->status=="1")
                                                    <div class="badge badge-default">Proposal</div>
                                                @elseif($project->status=="2")
                                                    <div class="badge badge-info">Pending</div>    
                                                @elseif($project->status=="3")
                                                    <div class="badge badge-warning">Approved</div>    
                                                @elseif($project->status=="4")
                                                    <div class="badge badge-primary">In Progress</div>     
                                                @elseif($project->status=="5")
                                                    <div class="badge badge-success">Completed</div>   
                                                @endif
                                            </td> --}}
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
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Active Tasks
            </div>
            <div class="card-body">
                <div class="scroll-area-md">
                    <div class="scrollbar-container ps ps--active-y">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            {{-- <thead>
                            <tr>
                                <th>Task Name</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead> --}}
                            <div class="table-responsive">
                                <tbody>
                                    @foreach ($user->tasks()->where('status', '4')->get() as $task)
                                    <tr>
                                        <td>
                                            <a href="{{route('task.show', $task)}}">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading"> {{$task->name}} </div>
                                                            <div class="widget-subheading opacity-7">{{$task->project->name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        {{-- <td class="text-center">
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
                                        </td> --}}
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
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Today's Meetings
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="scroll-area-md">
                            <div class="scrollbar-container ps ps--active-y">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <div class="table-responsive">
                                        <thead class="text-center">
                                            <th>Adhoc Meetings</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($todaysmeetings as $meeting)
                                            <tr>
                                                <td>
                                                    <a href="{{route('meeting.show', $meeting)}}">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"> {{$meeting->name}} </div>
                                                                    <div class="widget-subheading opacity-7">
                                                                        @if ($meeting->start != '')
                                                                            {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                                        @endif
                                                                        @if ($meeting->recurring_day != 'None')
                                                                            Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                {{-- <td class="text-center">
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
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scroll-area-md">
                            <div class="scrollbar-container ps ps--active-y">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <div class="table-responsive">
                                        <thead class="text-center">
                                            <th>Recurring Meetings</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($recurringmeetings as $meeting)
                                            <tr>
                                                <td>
                                                    <a href="{{route('meeting.show', $meeting)}}">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"> {{$meeting->name}} </div>
                                                                    <div class="widget-subheading opacity-7">
                                                                        @if ($meeting->start != '')
                                                                            {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                                        @endif
                                                                        @if ($meeting->recurring_day != 'None')
                                                                            Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                {{-- <td class="text-center">
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
                                                </td> --}}
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
    </div>
    
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Recent Files
            </div>
            <div class="card-body">
                <div class="scroll-area-md">
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
@endsection

@section('wew')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
