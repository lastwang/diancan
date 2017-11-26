<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"C:\Thankphp\Thinkphp\public/../application/admin\view\category\addson.html";i:1511358945;s:63:"C:\Thankphp\Thinkphp\public/../application/admin\view\base.html";i:1511313729;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>后盾网武斌博客网后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="__STATIC__/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/admin/css/site.css" rel="stylesheet">
    <link href="__STATIC__/admin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="__STATIC__/admin/js/jquery.min.js"></script>
    <script src="__STATIC__/admin/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>
    <script src="resource/hdjs/app/util.js"></script>
    <script src="resource/hdjs/require.js"></script>
    <script src="resource/hdjs/app/config.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>
</head>

<body>
    <div class="container-fluid admin-top">
        <!--导航-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html" style="color: white;margin-left: -14px">后盾网武斌博客网</a>
                    </h4>
                    <div class="navbar-header">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="http://www.kancloud.cn/manual/thinkphp5/118003" target="_blank"><i class="fa fa-w fa-file-code-o"></i>
                                在线文档</a>
                            </li>
                            <li>
                                <a href="http://fontawesome.dashgame.com/" target="_blank"><i
                                    class="fa fa-w fa-hand-o-right"></i> 图标库</a>
                            </li>
                            <li>
                                <a href="http://bbs.houdunwang.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 后盾网论坛</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="fa fa-w fa-user"></i> <?php echo session('admin.username'); ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo url('admin/entry/pass'); ?>">修改密码</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo url('admin/entry/loginOut'); ?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--导航end-->
    </div>
    <!--主体-->
    <div class="container-fluid admin_menu">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
                <div class="panel panel-default" id="menus">
                    <!--栏目管理-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border-top: 1px solid #ddd;border-radius: 0%">
                        <h4 class="panel-title">栏目管理</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample">
                        <a href="<?php echo url('admin/category/index'); ?>" class="list-group-item">
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 栏目列表
                        </a>
                    </ul>
                    <!--栏目管理 end-->

                    <!--标签管理-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">标签管理</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample2">
                        <a href="" class="list-group-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 标签列表
                        </a>
                    </ul>
                    <!--标签管理 end-->

                    <!--文章管理-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">文章管理</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample3">
                        <a href="" class="list-group-item">
                            <i class="fa fa-align-center" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 文章列表
                        </a>
                        <a href="" class="list-group-item">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 回收站
                        </a>
                    </ul>
                    <!--文章管理 end-->

                    <!--友链管理-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">友链管理</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample4" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample4">
                        <a href="" class="list-group-item">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 友链首页
                        </a>
                    </ul>
                    <!--友链管理 end-->
                    <!--站点配置-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">站点配置</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample5" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample5">
                        <a href="" class="list-group-item">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 网站配置
                        </a>
                    </ul>
                    <!--站点配置 end-->
                </div>
            </div>
            <!--右侧主体区域部分 start-->
            <div class="col-xs-12 col-sm-9 col-lg-10">
                
<ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
    <li>
        <a href=""><i class="fa fa-cogs"></i>
            栏目管理</a>
    </li>
    <li class="active">
        <a href="">栏目添加</a>
    </li>

</ol>
<ul class="nav nav-tabs" role="tablist">
    <li><a href="<?php echo url('index'); ?>">栏目列表</a></li>
    <li class="active"><a href="">添加子集栏目</a></li>
</ul>
<form class="form-horizontal" id="form" action="" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">栏目管理</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">栏目名称</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">所属栏目</label>
                <div class="col-sm-9">
                    <select class="js-example-basic-single form-control" name="pid">
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">栏目排序</label>
                <div class="col-sm-9">
                    <input type="number" name="sort" class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">确定</button>
</form>

            </div>
            <!--右侧主体区域部分结束 end-->
        </div>
    </div>
    </div>
    <div class="master-footer" style="margin-top: 150px">
        <a href="http://www.houdunwang.com">高端培训</a>
        <a href="http://www.hdphp.com">开源框架</a>
        <a href="http://bbs.houdunwang.com">后盾论坛</a>
        <br> Powered by hdphp v2.0 © 2016-2022 www.hdphp.com
    </div>
</body>

</html>