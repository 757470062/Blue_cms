/**
 * use all datatables
 * Created by Blue on 2017/6/4.
 */

var language = {
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
};
//请求类型
var type = 'post';
//laravel csrf_token
var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};
//默认排序
var order = [[ 0, "desc" ]];

$(document).ready( function () {
    //nestable
    $('#nestable').nestable();

    //select2
    $("#select2").select2({
        placeholder: "添加标签"
    });

    /*
     * datatables
     */
    //get all article
    $('#back_article_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/article/data",
            "type":type,
            "dataSrc":"data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'article_category.name', 'orderable': false},
            {'data':'title', 'orderable': false},
            {'data':'article_back_user.name', 'orderable': false},
            {'data':'keys', 'orderable': false},
            {'data':'flag_id', 'orderable': false},
            {'data':'clicks'},
            {'data':'photo', 'orderable': false, 'searchable': false},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all friend
    $('#back_friend_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/friend/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'link'},
            {'data':'photo'},
            {'data':'state'},
            {'data':'sort'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all Module
    $('#back_module_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/module/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'list'},
            {'data':'article'},
            {'data':'cover'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all picture
    $('#back_picture_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/picture/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'picture_category.name'},
            {'data':'photo'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all picture source
    $('#back_picture_source_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/picture-source/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'picture_source_picture.name'},
            {'data':'name'},
            {'data':'src'},
            {'data':'content'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );

    //get all download
    $('#back_download_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/download/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'down_load_category.name'},
            {'data':'photo','orderable': false},
            {'data':'state'},
            {'data':'sky_drive_name'},
            {'data':'sky_drive_src','orderable': false},
            {'data':'sky_drive_psw','orderable': false},
            {'data':'src','orderable': false},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );

    //get all vidio 视频集
    $('#back_vidio_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/vidio/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'vidio_category.name'},
            {'data':'photo','orderable': false},
            {'data':'intro','orderable': false},
            {'data':'updated_at','orderable': false},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all vidio_source 视频集
    $('#back_vidio_source_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/vidio-source/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'vidio_source_vidio.name'},
            {'data':'definition'},
            {'data':'size'},
            {'data':'photo','orderable': false},
            {'data':'src','orderable': false},
            {'data':'intro','orderable': false},
            {'data':'updated_at','orderable': false},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );
    //get all tag
    $('#back_tag_all').DataTable( {
        //语言设置
        "language": language,
        "processing": true,
        //开启服务器模式
        "serverSide": true,
        //ajax数据
        "ajax": {
            "url":"/back/tag/data",
            "type":type,
            "dataSrc": "data",
            "headers":headers
        },
        //设置列
        "columns": [
            {'data':'id'},
            {'data':'name'},
            {'data':'updated_at','orderable': false},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true,
        //默认排序
        "order": order
    } );

} );



