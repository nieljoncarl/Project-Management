@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-book icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Reports</div>
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
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Generate All Task Report</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('report.store')}}" method="post" class="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="project_name" class="">Report Name</label>
                                    <input name="name" id="project_name" placeholder="Report Name" type="text" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="start" class="">Date Start</label>
                                    <div class="input-group date" id="start" data-target-input="nearest">
                                        <input type="text" name="start" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start" readonly/>
                                        <div class="input-group-append" data-target="#start" data-toggle="datetimepicker" >
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="end" class="">Date End</label>
                                    <div class="input-group date" id="end" data-target-input="nearest">
                                        <input type="text" name="end" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end" readonly/>
                                        <div class="input-group-append" data-target="#end" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-success">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Generate Project Specific Task Report</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('report.store')}}" method="post" class="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="status" class="">Project Name</label>
                                    <select class="custom-select" name="status" id="status">
                                        @foreach ($user->projects()->get() as $project)
                                            <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="start" class="">Date Start</label>
                                    <div class="input-group date" id="start" data-target-input="nearest">
                                        <input type="text" name="start" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start" readonly/>
                                        <div class="input-group-append" data-target="#start" data-toggle="datetimepicker" >
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="end" class="">Date End</label>
                                    <div class="input-group date" id="end" data-target-input="nearest">
                                        <input type="text" name="end" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end" readonly/>
                                        <div class="input-group-append" data-target="#end" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-success">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#start').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start").on("change.datetimepicker", function (e) {
            $('#end').datetimepicker('minDate', e.date);
        });
        $("#end").on("change.datetimepicker", function (e) {
            $('#start').datetimepicker('maxDate', e.date);
        });
    });
</script>
@endsection