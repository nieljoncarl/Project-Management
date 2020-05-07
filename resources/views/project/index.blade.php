@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-book icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Projects</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('project.create')}}">
                <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Create Project">
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Project Name</th>
                            <th class="text-center">Project Leader</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="{{route('project.show', $project)}}">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$project->alias}}</div>
                                                    <div class="widget-subheading opacity-7">{{$project->name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('user.show', $project->users()->where('type', 'Creator')->first()->id)}}" class="btn btn-link btn-sm">
                                        {{$project->users()->where('type', 'Creator')->first()->name}}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($project->status=="Pending")
                                        <div class="badge badge-info">{{$project->status}}</div>
                                    @elseif($project->status=="Approved")
                                        <div class="badge badge-primary">{{$project->status}}</div>    
                                    @elseif($project->status=="In Progress")
                                        <div class="badge badge-success">{{$project->status}}</div>   
                                    @else
                                        <div class="badge badge-warning">{{$project->status}}</div>
                                    @endif
                                    
                                </td>
                                <td class="text-center">
                                    <a href="{{route('project.edit', $project)}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection