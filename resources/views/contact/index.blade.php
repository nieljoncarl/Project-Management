@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Contacts</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
<div class="row">
    @foreach ($users as $user)
    <div class="col-md-2 mb-4">
        <div class="mb-3 text-center card card-body">
            <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text"> <a href="mailto:{{ $user->email}}">{{ $user->email}}</a></p>
                <p class="card-text"> <a href="tel:{{ $user->contact_no}}">{{ $user->contact_no}}</a></p>
                <p class="card-text"> <a target="__blank" href="https://www.google.com/maps/search/?api=1&query={{ $user->address}}"> {{ $user->address}} </a></p>
            <button class="btn btn-primary" onclick="location.href='{{route('user.show', $user)}}'" type="button">
                View
            </button>
        </div>
    </div>
    @endforeach
</div>
@endsection