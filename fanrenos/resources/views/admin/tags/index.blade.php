@extends('admin.layouts.base')

@section('title','标签列表')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <a href="{{url('/dashboard/tag/recycle/index')}}" class="btn btn-success btn-md">
                    <i class="fa fa-trash-o"></i> 回收站<span style="color: #EC4758;">@if($soft>0)（{{$soft}}）@endif</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')
                <div class="panel-heading">
                    <h3 class="panel-title">标签列表</h3>
                </div>
                <div class="text-left">
                <button type="button" class="btn btn-info btn-sm" id="all_select" style="margin-bottom: 5px;">全选</button>
                <button type="button" class="btn btn-warning btn-sm" onclick="batchDel('tag')" style="margin: 0px 0px 5px 5px;">批量删除</button>
            </div>
                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th data-sortable="false" class="hidden-sm"></th>
                            <th style="text-align: center;">ID</th>
                            <th>标签</th>
                            <th>标题</th>
                            <th class="hidden-md">主要描述</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{!!$tag->select_input!!}</td>
                            <td style="text-align: center;">{{ $tag->id }}</td>
                            <td>{{ $tag->tag }}</td>
                            <td>{{ $tag->title }}</td>
                            <td class="hidden-md">{{ $tag->meta_description }}</td>
                            <td>
                                <a href="{{url('/dashboard/tag')}}/{{ $tag->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
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
            $("#tags-table").DataTable({
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
                order: [[1, "asc"]]
            });
        });
    </script>
@stop