@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-hand-holding-usd icon-gradient bg-plum-plate">
                </i>
            </div>
            <div> {{ $agency->name }} </div>
        </div>
        <div class="page-title-actions">
            <button type="button" tabindex="0" class="btn-shadow mr-3 btn btn-dark" data-toggle="modal" data-target=".modifyAgency">
                <i class="fa fa-edit"></i>
            </button>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card mb-4" style="width: 100%;">
            <img class="card-img-top" src="{{asset('images/hand-holding-usd-solid.svg')}}" style="max-height: 10rem; margin-top: 4rem" alt="agency Photo">
            <div class="card-body text-center">
              <p class="card-text"> Email Address: <br> <b> <a href="mailto:{{ $agency->contact_email}}">{{ $agency->contact_email}}</a> </b> </p>
              <p class="card-text"> Contact Number: <br> <b> <a href="tel:{{ $agency->contact_number}}">{{ $agency->contact_number}}</a> </b> </p>
              <p class="card-text"> Address: <br> <a target="__blank" href="https://www.google.com/maps/search/?api=1&query={{ $agency->address}}"> {{ $agency->address}} </a></p>
            </div>
        </div>
        @can('manage-officer')
        <div class="main-card mb-4 card">
            <div class="card-body text-center">
                <h5 class="card-title">
                    Admin Actions
                </h5>
                <hr>
                {{-- <button class="mb-2 mr-2 btn btn-dark"  data-toggle="modal" data-target="#generateTask">
                    Generate Task Report
                </button> --}}
                <button class="mb-2 mr-2 btn btn-dark">
                    Generate Log Report
                </button>
            </div>
        </div>
        @endcan
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">Projects</div>
                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                            <div class="btn-group dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="fa fa-plus fa-2x btn-icon-wrapper"></i>
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-212px, 36px, 0px);">
                                    <h6 tabindex="-1" class="dropdown-header">Add Project</h6>
                                    <form class="dropdown-header" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Search Project Name">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-lg">
                            <table class="align-middle mb-0 table table-borderless table-hover">
                                <div class="table-responsive">
                                    <tbody>
                                        @foreach ($agency->projects() as $project)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <a href="{{route('project.show', $project)}}"><div class="widget-heading">{{$project->alias}}</div></a>
                                                            <div class="widget-subheading">Role: {{$project->pivot->type}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <div class="card-header-title">Personnel</div>
                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                            <div class="btn-group dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="fa fa-plus fa-2x btn-icon-wrapper"></i>
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-212px, 36px, 0px);">
                                    <h6 tabindex="-1" class="dropdown-header">Add Person</h6>
                                    <form class="dropdown-header" action="">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="tel" class="form-control" name="contact_number" placeholder="Mobile Number">
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="scroll-area-lg">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <div class="table-responsive">
                                    <tbody>
                                        @foreach ($agency->users()->get() as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <a href="{{route('user.show', $user)}}"><div class="widget-heading">{{$user->name}}</div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$user->project->alias}}</td>
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
@endsection

@section('modals')

<div class="modal fade modifyAgency" tabindex="-1" role="dialog" aria-labelledby="addNewAgency" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('agency.update', $agency)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Modify Agency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Agency Name</label>
                                    <input name="name" placeholder="Full Agency Name" value="{{ $agency->name }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="address" class="">Address</label>
                                    <input name="address" placeholder="Address Searchable on Google Maps" value="{{ $agency->address }}"  type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Agency Email Address</label>
                                    <input name="contact_email" placeholder="Primary Agency Email Address" value="{{ $agency->contact_email }}"  type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Agency Contact Number</label>
                                    <input name="contact_number" placeholder="Primary Agency Contact Number" value="{{ $agency->contact_number }}"  type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
