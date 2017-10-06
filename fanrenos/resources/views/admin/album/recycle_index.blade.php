@extends('admin.layouts.base')

@section('title','已经删除相册列表')

@section('content')
    <div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <a href="{{url('/dashboard/album/index')}}" class="btn btn-success btn-md">
                <i class="fa fa-mail-reply-all"></i> 返回相册列表
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            @include('admin.partials.errors')
            @include('admin.partials.success')
            <div class="panel-heading">
                <h3 class="panel-title">已经删除图片列表</h3>
            </div>
            <table id="posts-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th>图片名称</th>
                    <th>文件类型</th>
                    <th>图像</th>
                    <th>更新时间</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td style="text-align: center;">{{ $album->id }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->mime }}</td>
                    <td><img src="{{ page_image_size($album->name,150,'albums')}}" onclick="preview_image('{{ page_image_size($album->name,1200,'albums') }}')"></td>
                    <td>{{ $album->updated_at }}</td>
                    <td>
                        <a href="javascript:;" class="btn btn-xs btn-info" onclick="recoveryDel('album',{{$album->id}})">
                            <i class="fa fa-hand-o-right"></i> 恢复
                        </a>
                        <a href="javascript:;" attr="{{$album->id}}" class="btn btn-xs btn-danger realDel">
                            <i class="fa fa-trash"></i> 彻底删除
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        确认要彻底删除此图片么？
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="deleteForm" method="POST" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-default del_back_btn" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger del_sure_btn">
                            <i class="fa fa-times-circle"></i>确认
                        </button>
                    </form>
                </div>
            </div>
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
            order: [[4, "desc"]]
        });

        $(document).on('click',".realDel",function () {
            var id = $(this).attr('attr');
            var d_u = "{{url('/dashboard/album/real_delete')}}"+'/'+id;
            $('.lead').text('确认要彻底删除此图片么？');
            $('.deleteForm').attr('action', d_u);
            $("#modal-delete").modal();
        });
    });
</script>
@stop