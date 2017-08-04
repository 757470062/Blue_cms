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
                <h1>分类回收站</h1>
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
                @include('back.trashed.nav')
                <section class="panel panel-danger col-md-8">
                    <header class="panel-heading">
                        <h4 class="panel-title">分类列表</h4>
                    </header>
                    <div class="panel-body">
                        <table id="back_category_all_trashed" class="table datatable dataTable no-footer" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>模块名称</th>
                                <th>分类名称</th>
                                <th>删除时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>模块名称</th>
                                <th>分类名称</th>
                                <th>删除时间</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                        </table>
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