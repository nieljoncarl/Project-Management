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
    </div>
</div>    
@endsection
@section('content')
    <div class="row">
        
        <div class="col-sm-12 col-lg-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Generate Project Report</div>
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
                                    <label for="start1" class="">Date Start</label>
                                    <div class="input-group date" id="start1" data-target-input="nearest">
                                        <input type="text" name="start1" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start1" readonly/>
                                        <div class="input-group-append" data-target="#start1" data-toggle="datetimepicker" >
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="end1" class="">Date End</label>
                                    <div class="input-group date" id="end1" data-target-input="nearest">
                                        <input type="text" name="end1" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end1" readonly/>
                                        <div class="input-group-append" data-target="#end1" data-toggle="datetimepicker">
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
        <div class="col-sm-12 col-lg-4 mb-4">
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
                                    <label for="start2" class="">Date Start</label>
                                    <div class="input-group date" id="start2" data-target-input="nearest">
                                        <input type="text" name="start2" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start2" readonly/>
                                        <div class="input-group-append" data-target="#start2" data-toggle="datetimepicker" >
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="end2" class="">Date End</label>
                                    <div class="input-group date" id="end2" data-target-input="nearest">
                                        <input type="text" name="end2" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end2" readonly/>
                                        <div class="input-group-append" data-target="#end2" data-toggle="datetimepicker">
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
        <div class="col-sm-12 col-lg-4 mb-4">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">Generate Meetings Report</div>
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
                                    <label for="start3" class="">Date Start</label>
                                    <div class="input-group date" id="start3" data-target-input="nearest">
                                        <input type="text" name="start3" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#start3" readonly/>
                                        <div class="input-group-append" data-target="#start3" data-toggle="datetimepicker" >
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="end3" class="">Date End</label>
                                    <div class="input-group date" id="end3" data-target-input="nearest">
                                        <input type="text" name="end3" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#end3" readonly/>
                                        <div class="input-group-append" data-target="#end3" data-toggle="datetimepicker">
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

        $('#start1').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end1').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start1").on("change.datetimepicker", function (e) {
            $('#end1').datetimepicker('minDate', e.date);
        });
        $("#end1").on("change.datetimepicker", function (e) {
            $('#start1').datetimepicker('maxDate', e.date);
        });
        // START2
        $('#start2').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end2').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start2").on("change.datetimepicker", function (e) {
            $('#end2').datetimepicker('minDate', e.date);
        });
        $("#end2").on("change.datetimepicker", function (e) {
            $('#start2').datetimepicker('maxDate', e.date);
        });
        // START3
        $('#start3').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $('#end3').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            ignoreReadonly: true
        });
        $("#start3").on("change.datetimepicker", function (e) {
            $('#end3').datetimepicker('minDate', e.date);
        });
        $("#end3").on("change.datetimepicker", function (e) {
            $('#start3').datetimepicker('maxDate', e.date);
        });
    });
</script>
@endsection