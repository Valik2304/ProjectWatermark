@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.'Feed')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class=""></i> Google Feeds
        </h1>

    </div>

@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="alerts">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <a href="{{ route('feed.generate') }}" class="btn btn-success btn-add-new">
                                <span>Cгенерувати Google Feeds</span>
                            </a>
                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name">Link to Google Feeds</label>

                                <input  type="text" disabled class="form-control" value="{{ url('/feeds.xml') }}" style="cursor: text;">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



