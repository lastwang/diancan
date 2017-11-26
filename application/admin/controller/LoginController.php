<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;
// use houdunwang\crypt\Crypt;

class LoginController extends Controller
{
    //登入
    public function login()
    {
        // echo Crypt::encrypt('admin888');
        //加密结果h3vPU8JGuF3VS/uxIpjRSw==
        // echo Crypt::decrypt('h3vPU8JGuF3VS/uxIpjRSw==');//解密
        // $data=Db("admin")->find(1);
        // dump($data);
        if(request()->isPost())
        {
            $res=(new Admin())->login(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'admin/Entry/adminindex');
                exit;
            }
            else{
                $this->error($res['msg']);
            }
            // halt($_POST);
        }
        return $this->fetch('index');
    }
}
