<?php

namespace app\admin\model;

use think\Model;
use think\Loader;
use houdunwang\crypt\Crypt;
use think\Validate;

class Admin extends Model
{
    //
    protected $name="admin";
    protected $pk="id";

    public function login($data)
    {
        $validate=Loader::validate('Admin');
        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }

        $userInfo=$this->where('username', $data['username'])
        ->where('password', Crypt::encrypt($data['password']))
        ->find();
        
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'用户名或密码不正确'];
        }

        session('admin.id',$userInfo['id']);
        session('admin.username',$userInfo['username']);
        return ['valid'=>1,'msg'=>'登录成功'];
    }

    /**
     * @parm 修改密码;
     */
    public function pass($data)
    {
        //1.验证器验证
        $validate = new Validate([
            'password' => 'require',
            'new_password' => 'require',
            'confirm_password'=>'require|confirm:new_password'
        ],
        [
            'password.require' => '请输入初始密码',
            'new_password.require' => '请输入新密码',
            'confirm_password.require'=>'请输入确认密码',
            'confirm_password.confirm'=>'新密码和确认密码不一致'
        ]);

        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }

        $userInfo=$this->where('id',session('admin.id'))
        ->where('password', Crypt::encrypt($data['password']))
        ->find();
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'初始密码错误'];
        }

        /**
         * 更新数据
         */
        $res=$this->save(['password' => Crypt::encrypt($data['new_password'])],
        [$this->pk => session('admin.id')]);
        if($res)
        {
            return ['valid'=>1,'msg'=>'修改成功'];
        }
        else{
            return ['valid'=>0,'msg'=>'修改失败'];
        }
    }
}
