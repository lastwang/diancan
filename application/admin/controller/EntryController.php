<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;

class EntryController extends CommonController
{
    public function adminindex()
    {
        return $this->fetch();
    }
    public function index()
    {
        return $this->fetch();
    }
    /**
     * 修改密码
     */
    public function pass()
    {
        if(request()->isPost())
        {
            $res=(new Admin())->pass(input('post.'));
            if($res['valid'])
            {
                /**
                 * 原始密码是否一致
                 */
                session(null);
                $this->success($res['msg'],'admin/entry/adminindex');
                exit;
            }
            else{
                $this->error($res['msg']);
                exit;
            }
        }
        return $this->fetch();
    }

    /**
     * 退出
     */

    public function loginOut()
    {
        session(null);
        $this->success('退出成功','admin/login/login');
        exit;
    }
}
