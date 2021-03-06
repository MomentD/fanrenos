@extends('admin.layouts.base')

@section('title','添加用户')
@section('css')
    <link href="{{asset('/assets/pickadate/themes/default.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/pickadate/themes/default.date.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/pickadate/themes/default.time.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/selectize/css/selectize.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@stop

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加新账号</h3>
                        </div>
                        <div class="panel-body">

                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <form class="form-horizontal comment_form" role="form" method="POST" action="{{url('/dashboard/user/')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="name" value="{{ $name }}" autofocus required="">
                                    </div>
                                </div>
                                @include('admin.user._form')
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i>
                                            添加
                                        </button>
                                        <button type="button" onclick="back_btn()" class="btn btn-default">
                                            <i class="fa  fa-reply-all"></i>
                                            返回
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="{{asset('/assets/pickadate/picker.js')}}"></script>
<script src="{{asset('/assets/pickadate/picker.date.js')}}"></script>
<script src="{{asset('/assets/pickadate/picker.time.js')}}"></script>
<script src="{{asset('/assets/selectize/js/selectize.min.js')}}"></script>
@stop