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
//
var type = 'post';
//laravel csrf_token
var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};

$(document).ready( function () {

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
            {'data':'article_category.name'},
            {'data':'title'},
            {'data':'article_back_user.name'},
            {'data':'keys'},
            {'data':'flag_id'},
            {'data':'clicks'},
            {'data':'photo'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true
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
        "deferRender": true
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
        "deferRender": true
    } );
    //get all Module
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
            {'data':'picture_tag_id'},
            {'data':'photo'},
            {'data':'updated_at'},
            {'data': 'action', 'orderable': false, 'searchable': false}
        ],
        //延迟处理数据
        "deferRender": true
    } );


} );



