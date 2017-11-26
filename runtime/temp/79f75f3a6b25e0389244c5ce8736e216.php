<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"C:\Thankphp\Thinkphp\public/../application/admin\view\entry\index.html";i:1510990966;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>hdphp教学博客-首页</title>
    <!--描述和摘要-->
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--载入公共模板-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/org/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
    <script src="__STATIC__/admin/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/admin/org/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/index.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/backTop.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>欢迎来到后盾BLOG教学系统</h1>
                </div>
            </div>
        </div>
    </header>
    <nav role="navigation" class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
							
								<span class="sr-only">切换导航</span>
								
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                    </div>


                    <div class="collapse navbar-collapse" id="example-navbar-collapse">
                        <ul class="_menu">
                            <li class="_active"><a href="index.html">首页</a></li>
                            <li><a href="">新闻</a></li>
                            <li><a href="">军事</a></li>
                            <li><a href="">娱乐</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row">
                <!--标签规定文档的主要内容main-->
                <main class="col-md-8">
                    <article class="_carousel">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="__STATIC__/admin/images/1.jpg">
                                </div>
                                <div class="item">
                                    <img src="__STATIC__/admin/images/2.jpg">
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </article>
                    <article>
                        <div class="_head">
                            <h1>标题</h1>
                            <span>
								作者：
								黄晓明
								</span> •
                            <!--pubdate表⽰示发布⽇日期-->
                            <time pubdate="pubdate" datetime="2017-1-1">2017-1-1</time> • 分类：
                            <a href="list.html">新闻</a>
                        </div>
                        <div class="_digest">
                            <img src="__STATIC__/admin/images/1.jpg" class="img-responsive" />
                            <p>
                                摘要
                            </p>
                        </div>
                        <div class="_more">
                            <a href="" class="btn btn-default">阅读全文</a>
                        </div>
                        <div class="_footer">
                            <i class="glyphicon glyphicon-tags"></i>
                            <a href="">PHP</a>、
                            <a href="">PHP</a>、
                        </div>
                    </article>
                </main>
                <aside class="col-md-4 hidden-sm hidden-xs">
                    <div class="_widget">
                        <h4>关于后盾</h4>
                        <div class="_info">
                            <p>最认真的PHP培训机构 只讲真功夫的PHP培训机构 最火爆的IT课程</p>
                            <p>
                                <i class="glyphicon glyphicon-volume-down"></i>
                                <a href="http://www.houdunwang.com" target="_blank">北京后盾网</a>
                            </p>
                        </div>
                    </div>
                    <div class="_widget">
                        <h4>分类列表</h4>
                        <div>
                            <a href="">娱乐</a>
                        </div>
                    </div>
                    <div class="_widget">
                        <h4>标签云</h4>
                        <div class="_tag">
                            <a href="">PHP</a>
                            <a href="">PHP</a>
                            <a href="">PHP</a>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>
    <footer class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="_title">最新文章</h4>
                    <div id="" class="_single">
                        <p><a href="">标题</a></p>
                        <time>2010年11月06日11:24:16</time>
                    </div>
                    <div id="" class="_single">
                        <p><a href="">标题</a></p>
                        <time>2010年11月06日11:24:16</time>
                    </div>
                </div>
                <div class="col-sm-4 footer_tag">
                    <div id="">
                        <h4 class="_title">标签云</h4>
                        <a href="">PHP</a>
                        <a href="">PHP</a>
                        <a href="">PHP</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h4 class="_title">友情链接</h4>
                    <div id="" class="_single">
                        <p><a href="" target="_blank">百度</a></p>
                        <p><a href="" target="_blank">百度</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="">网站名称</a> |
                    <a href="">版权信息</a> |
                    <a href="">admin@163.com</a>
                </div>
            </div>
        </div>
    </div>
    <!--返回顶部自己写的插件-->
    <script src="__STATIC__/admin/js/backTop.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(function() {
            //插件使用
            $('.back_top').backTop({
                right: 30
            });
        })
    </script>
    <div class="back_top hidden-xs hidden-md">
        <i class="glyphicon glyphicon-menu-up"></i>
    </div>
</body>

</html>