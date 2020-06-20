@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Create New Project</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('project.index')}}">
                <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-danger" data-original-title="Cancel">
                    <i class="fa fa-window-close"></i>
                </button>
            </a>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
<div class="container">
    <div class="main-card card">
        <div class="card-body"><h5 class="card-title">Project Information</h5>
            <form action="{{ route('project.store')}}" method="post" class="">
                @csrf
                <div class="form-row">
                    <div class="col-md-8">
                        <div class="position-relative form-group">
                            <label for="project_name" class="">Project Name</label>
                            <input name="name" id="project_name" placeholder="Project Name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="alias" class="">Project Alias</label>
                            <input name="alias" id="alias" placeholder="Project Alias / Code" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="start" class="">Start Date</label>
                            <input name="start" id="start" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="end" class="">End Date</label>
                            <input name="end" id="end" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="status" class="">Project Status</label>
                            <select name="status" id="status" class="custom-select">
                                <option value="Pending">Proposal</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="In Progress">In Progress</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="project_name" class="">Project Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="project_name" class="">Project Outcomes</label>
                            <textarea name="outcomes" id="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-secondary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    
    $( document ).ready(function() 
    {    
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        //document.write(today);

        
        document.getElementById('start').value = today;
        document.getElementById('end').value = today;
    });


</script>
@endsection