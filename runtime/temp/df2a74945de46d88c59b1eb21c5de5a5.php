<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"C:\Thankphp\Thinkphp\public/../application/index\view\login\login1.html";i:1512736635;s:64:"C:\Thankphp\Thinkphp\public/../application/index\view\index.html";i:1512736853;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="__PUBLIC__/images/favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__PUBLIC__/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="__PUBLIC__/css/index.css" rel="stylesheet">

    <link rel="stylesheet" href="__PUBLIC__/login-register.css">

    <script src="__PUBLIC__/js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="__PUBLIC__/js/jquery.min.js"><\/script>')
    </script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/holder.min.js"></script>
    <script src="__PUBLIC__/js/ie10-viewport-bug-workaround.js"></script>
    <!-- 引进登录注册js -->
    <script src="__PUBLIC__/js/index.js"></script>

    <script src="__PUBLIC__/login-register.js"></script>

    <link rel="stylesheet" href="__PUBLIC__/css/font-awesome.css">
    <script>
        jQuery.noConflict();
        jQuery(function() {
            jQuery('#myCarousel').carousel({
                interval: 2000
            }); //每隔5秒自动轮播 
        });
    </script>
</head>
<!-- NAVBAR
================================================== -->

<body style="background-image: url(http://www.blog.wang.com/uploads/20171208\5fa867a09c14124826f178d7def2fc16.jpg);" path="http://www.blog.wang.com/uploads/20171208\5fa867a09c14124826f178d7def2fc16.jpg">

    
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--  -->
                        <li clas="dropdown">
                            <a <?php if(session('useremail') == null): ?>class='hidden' <?php endif; ?> href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="fa fa-w fa-user"></i> <?php echo session('useremail'); ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="openReviseModal();">修改密码</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo url('loginOut'); ?>">退出</a></li>
                            </ul>
                        </li>
                        <li><a <?php if(session('useremail') != null): ?>class='hidden' <?php endif; ?> data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a></li>
                        <li><a <?php if(session('useremail') != null): ?>class='hidden' <?php endif; ?> data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a></li>
                        <!-- <li><a data-toggle="modal" data-target="#signinModal">注册</a></li>
                        <li><a data-toggle="modal" data-target="#loginModal">登录</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <!--class="close"，close 是一个 CSS class，用于为模态窗口的关闭按钮设置样式。
                        data-dismiss="modal"，是一个自定义的 HTML5 data 属性。在这里它被用于关闭模态窗口。
                        ria-hidden="true" 用于保持模态窗口不可见，直到触发器被触发为止
                        ×	&times;-->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login with</h4>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a class="circle github" href="/auth/github">
                                <i class="fa fa-github fa-fw"></i>
                            </a>
                            <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                <i class="fa fa-google-plus fa-fw"></i>
                            </a>
                            <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                        </div>
                        <div class="division">
                            <div class="line l"></div>
                            <span>or</span>
                            <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                            <form method="post" action="/index/login/login" accept-charset="UTF-8">
                                <input class="form-control" type="text" placeholder="Email" name="useremail">
                                <input class="form-control" type="password" placeholder="Password" name="password">
                                <input class="btn btn-default btn-login" type="submit" value="Login">
                                <!-- <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()"> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <form method="post" data-remote="true" action="/index/login/regist" accept-charset="UTF-8">
                                <input class="form-control" type="text" placeholder="Email" name="useremail">
                                <input class="form-control" type="password" placeholder="Password" name="password">
                                <input class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                            </form>
                        </div>
                    </div>

                    <div class="content reviseBox" style="display:none;">
                        <div class="form">
                            <form method="post" data-remote="true" action="/index/login/pass" accept-charset="UTF-8">
                                <input class="form-control" type="password" placeholder="oldPassword" name="old_password">
                                <input class="form-control" type="password" placeholder="Password" name="password">
                                <input class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="修改密码" name="commit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>Looking to 
                             <a href="javascript: showRegisterForm();">create an account</a>
                        ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
                </div>
                <div class="forgot revise-footer" style="display:none">
                    <!-- <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Carousel

    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

</body>

</html>