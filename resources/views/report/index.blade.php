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
                <div class="card-body">
                    <div class="scroll-area-xl">
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
                                            @if($project->status=="1")
                                                <div class="badge badge-default">Proposal</div>
                                            @elseif($project->status=="2")
                                                <div class="badge badge-info">Pending</div>    
                                            @elseif($project->status=="3")
                                                <div class="badge badge-warning">Approved</div>    
                                            @elseif($project->status=="4")
                                                <div class="badge badge-primary">In Progress</div>     
                                            @elseif($project->status=="5")
                                                <div class="badge badge-success">Completed</div>   
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
        </div>
    </div>
@endsection