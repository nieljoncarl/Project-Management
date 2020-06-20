@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-hand-holding-usd icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Agencies</div>
        </div>
        <div class="page-title-actions">
            <button type="button" tabindex="0" class="btn-shadow mr-3 btn btn-dark" data-toggle="modal" data-target=".addNewAgency">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
<div class="row">
    @foreach ($agencies as $agency)
    <div class="col-md-4 d-flex align-items-stretch">
        <div class="card card-body">
            <div class="card-header">
                <h5 class="card-title text-center">{{$agency->name}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Email Address: <br> <b> <a href="mailto:{{ $agency->contact_email}}">{{ $agency->contact_email }}</a> </b> <br>
                    Contact Number: <br> <b> <a href="tel:{{ $agency->contact_number}}">{{ $agency->contact_number }}</a> </b>
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block" onclick="location.href='{{route('agency.show', $agency)}}'" type="button">
                    View
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('modals')
    
<div class="modal fade addNewAgency" tabindex="-1" role="dialog" aria-labelledby="addNewAgency" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('agency.store')}}" method="post">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add New Agency</h5>
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
                                    <input name="name" placeholder="Full Agency Name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="address" class="">Address</label>
                                    <input name="address" placeholder="Address Searchable on Google Maps" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Agency Email Address</label>
                                    <input name="contact_email" placeholder="Primary Agency Email Address" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Agency Contact Number</label>
                                    <input name="contact_number" placeholder="Primary Agency Contact Number" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Agency</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection