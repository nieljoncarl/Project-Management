@extends('layouts.main')
@section('title')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-hand-holding-usd icon-gradient bg-plum-plate">
                </i>
            </div>
            <div>Funding Agencies</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('funding.create')}}">
                <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Add New Funding Agency">
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </div>
    </div>
    
</div>    
@endsection
@section('content')
    <div class="row">
        
    </div>
@endsection