@extends('admin.layouts.base')

@section('title','文章列表')

@section('content')
    <div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <a href="{{url('/dashboard/article/recycle/index')}}" class="btn btn-success btn-md">
                <i class="fa fa-trash-o"></i> 回收站<span style="color: #EC4758;">@if($soft>0)（{{$soft}}）@endif</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            @include('admin.partials.errors')
            @include('admin.partials.success')
            <div class="panel-heading">
                <h3 class="panel-title">文章列表</h3>
            </div>
            <table id="posts-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">文章ID</th>
                    <th>发布时间</th>
                    <th>标题</th>
                    <th>副标题</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($articles as $post)
                <tr>
                    <td style="text-align: center;">{{ $post->id }}</td>
                    <td data-order="{{ $post->published_at->timestamp }}">
                        {{ $post->published_at->format('j-M-y g:ia') }}
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subtitle }}</td>
                    <td>
                        <a href="{{url('/dashboard/article')}}/{{ $post->id }}/edit" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="{{url('/blog')}}/{{ $post->slug }}" class="btn btn-xs btn-warning" target="_blank">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

</div>
@stop

@section('js')
    <script>
        $(function() {
        $("#posts-table").DataTable({
            language: {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            },
            order: [[0, "desc"]]
        });
    });
    </script>
@stop