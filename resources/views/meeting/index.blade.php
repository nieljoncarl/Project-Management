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
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Today's Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Upcoming Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Past Meetings</div>
                </div>
                <div class="card-body">
                    <div class="scroll-area-md scrollhere">
                        <div class="scrollbar-container ps ps--active-y">
                            <ul class="todo-list-wrapper list-group list-group-flush">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection