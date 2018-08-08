@extends('Admin.common')

@section('AD2_title', '后台首页')

@section('sidebar')
    @parent
@endsection

@section('content')
            @if (session('Success'))
            <div class="alert alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{session('Success')}}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $Feedback_count }}</div>
                                    <div>反馈数总计</div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/feedback/index">
                            <div class="panel-footer">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $Orders_count }}</div>
                                    <div>总订单</div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/orders/index">
                            <div class="panel-footer">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $ShopCar_count }}</div>
                                    <div>购物车总商品</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $U_count }}</div>
                                    <div>全部用户(不包括被冻结的)</div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/user/index">
                            <div class="panel-footer">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i>消息
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a class="list-group-item">
                                    <i class="fa fa-file-o fa-fw"></i> {{ $_SERVER['DOCUMENT_ROOT'] }}
                                    <span class="pull-right text-muted small"><em>{{ GetIP($_SERVER['REMOTE_ADDR']) }}</em>
                                    </span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-desktop fa-fw"></i> {{ php_uname('a') }}
                                    <span class="pull-right text-muted small"><em>{{ date('Y-m-d H:i:s',time()) }}</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
@endsection
