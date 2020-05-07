@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Calendar</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div id="calendar" class="fc fc-bootstrap4 fc-ltr">
            </div>
        </div>

    </div>
</div>
@endsection