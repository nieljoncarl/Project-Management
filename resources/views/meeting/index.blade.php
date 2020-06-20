@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-handshake icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Meetings</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <div class="card-hover-shadow-2x mb-4 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Today's Meetings</div>
                </div>
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <b>Adhoc Meetings</b>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        @foreach ($todaysmeetings as $meeting)
                                        <li class="list-group-item">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">
                                                        <a href="{{route('meeting.show',$meeting)}}">
                                                            <b>{{$meeting->name}}</b>
                                                        </a>
                                                    </div>
                                                    <div class="widget-subheading">
                                                        @if ($meeting->start != '')
                                                            {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                        @endif
                                                        @if ($meeting->recurring_day != 'None')
                                                            Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Recurring Meetings</b>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        @foreach ($recurringmeetings as $meeting)
                                        <li class="list-group-item">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">
                                                        <a href="{{route('meeting.show',$meeting)}}">
                                                            <b>{{$meeting->name}}</b>
                                                        </a>
                                                    </div>
                                                    <div class="widget-subheading">
                                                        @if ($meeting->start != '')
                                                            {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                        @endif
                                                        @if ($meeting->recurring_day != 'None')
                                                            Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="scroll-area-md">
                                <div class="scrollbar-container ps ps--active-y">
                                    <table class="align-middle mb-0 table table-borderless table-hover">
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
                                    <table class="align-middle mb-0 table table-borderless table-hover">
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
        <div class="col-md-6 ">
            <div class="card-hover-shadow-2x mb-4 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Upcoming Meetings</div>
                </div>
                <div class="card-body">
                    {{-- <div class="scroll-area-md">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">

                                @foreach ($upcomingmeetings as $meeting)
                                <li class="list-group-item">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <a href="{{route('meeting.show',$meeting)}}">
                                                    <b>{{$meeting->name}}</b>
                                                </a>
                                            </div>
                                            <div class="widget-subheading">
                                                @if ($meeting->start != '')
                                                    {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                @endif
                                                @if ($meeting->recurring_day != 'None')
                                                    Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="scroll-area-md">
                                <div class="scrollbar-container ps ps--active-y">
                                    <table class="align-middle mb-0 table table-borderless table-hover">
                                        <div class="table-responsive">
                                            <thead class="text-center">
                                                <th>Adhoc Meetings</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($upcomingmeetings as $meeting)
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
                                    <table class="align-middle mb-0 table table-borderless table-hover">
                                        <div class="table-responsive">
                                            <thead class="text-center">
                                                <th>Recurring Meetings</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($upcomingrecurringmeetings as $meeting)
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
        <div class="col-md-6 ">
            <div class="card-hover-shadow-2x mb-4 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Past Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-sm">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($pastmeetings as $meeting)
                                <li class="list-group-item">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <a href="{{route('meeting.show',$meeting)}}">
                                                    <b>{{$meeting->name}}</b>
                                                </a>
                                            </div>
                                            <div class="widget-subheading">
                                                @if ($meeting->start != '')
                                                    {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                @endif
                                                @if ($meeting->recurring_day != 'None')
                                                    Repeat Every: {{$meeting->recurring_time}} - {{$meeting->recurring_day}}
                                                @endif
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
        <div class="col-md-6 ">
            <div class="card-hover-shadow-2x mb-4 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">For Approval Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-sm">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                @foreach ($meetings->where('status', '2')->where('user_id', Auth::user()->id) as $meeting)
                                <li class="list-group-item">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <a href="{{route('meeting.show',$meeting)}}">
                                                    <b>{{$meeting->name}}</b>
                                                </a>
                                            </div>
                                            <div class="widget-subheading">
                                                @if ($meeting->start != '')
                                                    {{ $meeting->start->format('H:i M d, Y') }} to {{$meeting->end->format('H:i M d, Y')}}
                                                @endif
                                                @if ($meeting->recurring_day != 'None')
                                                    Repeat Every: {{$meeting->recurring_day}} - {{$meeting->recurring_time}}
                                                @endif
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
@endsection