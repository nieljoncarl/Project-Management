@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Manage Users</div>
        </div>
    </div>
</div>    
@endsection

@section('content')   
    <div class="row">
        @foreach ($users as $user)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$user->name}}</h4>
                    <h5>{{$user->email}}</h5>
                    <h6>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</h6>
                    <hr>
                    <div class="position-relative form-group">
                        @can('edit-users')
                            <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary btn-block">Modify</button></a>
                        @endcan
                        @can('delete-users')
                        <form action="{{ route('admin.users.destroy', $user)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-warning btn-block mt-1">Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
