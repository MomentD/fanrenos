@extends('layouts.base')

@section('content')
    @include('blogs.user.particals.info')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ lang('Your Comments') }} ( {{ $comments->count() }} )</div>

                    @include('blogs.user.particals.comments')

                </div>
            </div>
        </div>
    </div>
@endsection