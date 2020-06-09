@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-folder-open icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Files</div>
        </div>
    </div>
</div>    
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold"></i>Uploaded Files</div>
            </div>
            <div class="card-body ">
                <div class="scroll-area-lg">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($files->where('location', '!=' ,'') as $file)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a href="{{route('file.show', $file)}}">
                                                <b>{{$file->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            Date Added: {{ $file->created_at->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title text-capitalize font-weight-bold"></i>Linked Files</div>
            </div>
            <div class="card-body ">
                <div class="scroll-area-lg">
                    <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush ">
                            @foreach ($files->where('link', '!=' ,'') as $file)
                            <li class="list-group-item">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            <a target="_blank" href="{{$file->link}}">
                                                <b>{{$file->name}}</b>
                                            </a>
                                        </div>
                                        <div class="widget-subheading">
                                            Date Added: {{ $file->created_at->format('H:i M d, Y')}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
            </div>
        </div>
    </div>
</div>
@endsection