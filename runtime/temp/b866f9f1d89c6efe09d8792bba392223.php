<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"C:\Thankphp\Thinkphp\public/../application/admin\view\article\edit.html";i:1523330662;s:63:"C:\Thankphp\Thinkphp\public/../application/admin\view\base.html";i:1523370564;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>点餐后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="__STATIC__/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/admin/css/site.css" rel="stylesheet">
    <link href="__STATIC__/admin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="__STATIC__/admin/js/jquery.min.js"></script>
    <script src="__STATIC__/admin/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>
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
    <script>
        window.hdjs = {};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '__STATIC__/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = '<?php echo url("system/component/uploader"); ?>';
        //获取文件列表的后台地址
        window.hdjs.filesLists = '<?php echo url("system/component/filesLists"); ?>?';
    </script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/config.js"></script>
</head>

<body>
    <div class="container-fluid admin-top">
        <!--导航-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html" style="color: white;margin-left: -14px">在线点餐后台客网</a>
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
                            <!-- <li>
                                <a href="http://bbs.houdunwang.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 后盾网论坛</a>
                            </li> -->
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
                    <!--已处理订单-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border-top: 1px solid #ddd;border-radius: 0%">
                        <h4 class="panel-title">已处理订单</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample">
                        <a href="<?php echo url('admin/vegetable/index'); ?>" class="list-group-item">
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 已处理订单
                        </a>
                    </ul>
                    <!--菜列表 end-->

                    <!--未处理订单-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">菜分格添加</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample2">
                        <a href="<?php echo url('admin/Tag/index'); ?>" class="list-group-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span class="pull-right"></span> 菜分格添加
                        </a>
                    </ul>
                    <!--未处理订单 end-->

                    <!--已处理订单-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">菜列表</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample3">
                        <a href="<?php echo url('admin/article/index'); ?>" class="list-group-item">
                            <i class="fa fa-align-center" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 菜列表添加
                        </a>
                        <a href="<?php echo url('admin/article/recycle'); ?>" class="list-group-item">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 回收站
                        </a>
                    </ul>
                    <!--已处理订单 end-->

                    <!--菜系添加-->
                    <!-- <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">菜系添加</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample4" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample4">
                        <a href="<?php echo url('admin/link/index'); ?>" class="list-group-item">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 菜系添加
                        </a>
                    </ul> -->
                    <!--菜系添加 end-->
                    <!--营业收入-->
                    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                        <h4 class="panel-title">营业收入</h4>
                        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample5" aria-expanded="true">
                            <i class="fa fa-chevron-circle-down"></i>
                        </a>
                    </div>
                    <ul class="list-group menus collapse in" id="collapseExample5">
                        <a href="<?php echo url('admin/Webset/index'); ?>" class="list-group-item">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span class="pull-right" href=""></span> 营业收入
                        </a>
                    </ul>
                    <!--营业收入 end-->
                </div>
            </div>
            <!--右侧主体区域部分 start-->
            <div class="col-xs-12 col-sm-9 col-lg-10">
                
<ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
    <li>
        <a href="<?php echo url('index'); ?>"><i class="fa fa-cogs"></i>
            菜品管理</a>
    </li>
    <li class="active">
        <a href="<?php echo url('store'); ?>">菜品编辑</a>
    </li>
</ol>
<ul class="nav nav-tabs" role="tablist">
    <li><a href="<?php echo url('index'); ?>">菜品管理</a></li>
    <li class="active"><a href="<?php echo url('store'); ?>">菜品编辑</a></li>
</ul>
<form class="form-horizontal" id="form" action="" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">菜品管理</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">菜品标题</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="<?php echo $oldData['title']; ?>" placeholder="菜品标题">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">菜品作者</label>
                <div class="col-sm-9">
                    <input type="text" name="author" class="form-control" value="<?php echo $oldData['author']; ?>" placeholder="菜品作者">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">菜品价格</label>
                <div class="col-sm-9">
                    <input type="number" name="sort" class="form-control" value="<?php echo $oldData['sort']; ?>">
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="" class="col-sm-2 control-label">所属分类</label>
                <div class="col-sm-9">
                    <select class="js-example-basic-single form-control" name="cate_id">
                        <option value="0">请选择分类</option>
                    
                    </select>
                </div>
            </div> -->
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">标签</label>
                <div class="col-sm-9">
                    <?php if(is_array($tagDate) || $tagDate instanceof \think\Collection || $tagDate instanceof \think\Paginator): if( count($tagDate)==0 ) : echo "" ;else: foreach($tagDate as $key=>$vo): ?>
                    <label class="checkbox-inline">
                            <input <?php if(in_array($vo['tagid'],$tag_ids)): ?>checked<?php endif; ?> type="checkbox" name="tag[]" value="<?php echo $vo['tagid']; ?>"> <?php echo $vo['tagname']; ?>
                        </label> <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">缩略图</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input class="form-control" name="thumb" readonly="true" value="<?php echo $oldData['thumb']; ?>">
                        <div class="input-group-btn">
                            <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                        </div>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <img src="<?php echo $oldData['thumb']; ?>" class="img-responsive img-thumbnail" width="150">
                        <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">菜品摘要</label>
                <div class="col-sm-9">
                    <textarea type="text" name="abstract" class="form-control" placeholder="菜品摘要"><?php echo $oldData['abstract']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">菜品内容</label>
                <div class="col-sm-9">
                    <textarea id="container" name="content" style="height:300px;width:100%;"><?php echo $oldData['content']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="arctileid" value="<?php echo input('param.articleid'); ?>">
    <button class="btn btn-primary" type="submit">确定</button>
</form>
<script>
    require(['hdjs']);
    //上传图片
    function upImage() {
        require(['hdjs'], function(hdjs) {
            options = {
                multiple: false, //是否允许多图上传
                //data是向后台服务器提交的POST数据
                data: {
                    name: '后盾人',
                    year: 2099
                },
                //压缩图片尺寸
                compress: {
                    width: 1600,
                    height: 1600,
                }
            };
            hdjs.image(function(images) {
                //上传成功的图片， 数组类型
                // alert(images[0]);
                $("[name='thumb']").val(images[0]);
                $(".img-thumbnail").attr('src', images[0]);
            }, options)
        });
    }

    function removeImg(obj) {
        $(obj).prev('img').attr('src', '__STATIC__/node_modules/hdjs/dist/static/image/nopic.jpg ');
        $(obj).parent().prev().find('input').val('');
    }
</script>
<script>
    require(['hdjs'], function(hdjs) {
        var ueditor = hdjs.ueditor('container', {
            hash: 2,
            data: 'hd'
        }, function(editor) {
            console.log(3)
        });
    })
</script>

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