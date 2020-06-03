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
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card-hover-shadow-2x mb-4 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Upcoming Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-sm">
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
                                @foreach ($meetings->where('status', '5') as $meeting)
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