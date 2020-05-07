@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-book icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Edit Project: {{$project->name}} </div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('project.show', $project)}}">
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
            <form action="{{ route('project.update', $project)}}" method="post" class="">
                @csrf
                {{ method_field('PUT')}}
                <div class="form-row">
                    <div class="col-md-8">
                        <div class="position-relative form-group">
                            <label for="project_name" class="">Project Name</label>
                            <input name="name" id="project_name" placeholder="Project Name" value=" {{$project->name}} " type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="alias" class="">Project Alias</label>
                            <input name="alias" id="alias" placeholder="Project Alias / Code" value=" {{$project->alias}} " type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="start" class="">Start Date</label>
                            <input name="start" id="start" type="date" value=" {{$project->start}} "class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="end" class="">End Date</label>
                            <input name="end" id="end" type="date" value=" {{$project->end}} " class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="status" class="">Project Status</label>
                            <select name="status" id="status" class="custom-select">
                                <option value="Proposal">Proposal</option>
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
                            <textarea name="description" id="description" value="  " class="form-control" rows="5">{{$project->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="project_name" class="">Project Outcomes</label>
                            <textarea name="outcomes" id="description" value="  " class="form-control" rows="5">{{$project->outcomes}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection