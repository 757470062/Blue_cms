
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="src/img/favicon.ico">
    <title>Blue Cms - 系统后台</title>
    @include('back.public.css')
</head>

<body class="">
<div class="animsition">

    @include('back.public.menu')

    <main id="playground">

    @include('back.public.head')

    <!-- PAGE TITLE -->
        <section id="page-title" class="row">

            <div class="col-md-8">
                <h1>模块管理</h1>
            </div>

            <div class="col-md-4">
                <ol class="breadcrumb pull-right no-margin-bottom">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Datatables</li>
                </ol>
            </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
            <div class="row">
                <section class="panel panel-danger">
                    <header class="panel-heading">
                        <h4 class="panel-title">模块列表</h4>
                    </header>
                    <div class="panel-body">

                        <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                            <table id="back_module_all" class="table datatable dataTable no-footer" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>分类名称</td>
                                    <td>列表模板</td>
                                    <td>文档模板</td>
                                    <td>封面模板</td>
                                    <td>修改时间</td>
                                    <td>操作</td>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>分类名称</td>
                                    <td>列表模板</td>
                                    <td>文档模板</td>
                                    <td>封面模板</td>
                                    <td>修改时间</td>
                                    <td>操作</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div> <!-- / container-fluid -->


        @include('back.public.footer')


    </main> <!-- /playground -->

    @include('back.public.message')
    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>
</div> <!-- /animsition -->

@include('back.public.js')
</body>
</html>