<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Login;

class LoginController extends Controller
{
    //登录
    public function login()
    {
        if(\request()->isPost()){
            $res=(new Login())->login(input('post.'));
            if(!$res['valid'])
            {
                return $this->error($res['msg']);
                exit;
            }
            else
            {
                return $this->success($res['msg'],'login');
                exit;
            }
        }
        return $this->fetch();
    }

    /**
    * 注册
    */
    public function regist()
    {
       if(\request()->isPost())
       {
            // $result = $this->validate(input('post.'),'login');//控制器方法验证器验证
            // halt($result);
            $res=(new Login())->regist(input('post.'));
            if($res['valid'])
            {
                return $this->success($res['msg'],'login');
                exit;
            }
            else{
                return $this->error($res['msg']);
                exit;
            }
        //    halt(input('post.email')); //param.email
       }    
    }

    /***
     * 退出
     */
    public function loginOut()
    {
        \session(null);
        return $this->fetch('login');
    }

    /**
     * 修改密码
     */
    public function pass()
    {
        if(\request()->isPost())
        {
            $res=(new Login())->pass(input('post.'));
            if($res['valid'])
            {
                return $this->success($res['msg'],'loginOut');
                exit;
            }
            else
            {
                return $this->error($res['msg']);
                exit;
            }
        }
    }
}
