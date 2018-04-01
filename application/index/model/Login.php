<?php

namespace app\index\model;

use think\Model;
use think\Loader;
use houdunwang\crypt\Crypt;
use think\Validate;

class Login extends Model
{
    //
    protected $pk='userid';
    protected $name='login';

    /**
     * 注册
     */
    public function regist($data)
    {
        // $result = $this->validate($data,'Login');
        $validate=Loader::validate('Regist');
        // halt($result);
        if(!$validate->check($data))
        {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $userInfo=$this->where('useremail',$data['useremail'])->find();
        if($userInfo)
        {
            return ['valid'=>0,'msg'=>'用户名已经存在'];
        }
        else
        {
            $this->password = md5($data['password']);
            $this->useremail = $data['useremail'];
            $this->save();
            return ['valid'=>1,'msg'=>'注册成功'];
        }

    }

    /**
     * 登录
     */

     public function login($data)
     {
        $validate=Loader::validate('Regist');
        if(!$validate->scene('login')->check($data))
        {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $data['password']=md5($data['password']);
        $userInfo=$this->where('useremail',$data['useremail'])->find();
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'用户名不存在'];
        }
        else if($userInfo['password']!=$data['password'])
        {
            return ['valid'=>0,'msg'=>'密码错误'];
        }
        else{
            session('userid',$userInfo['userid']);
            session('useremail',$userInfo['useremail']);
            return ['valid'=>1,'msg'=>'登录成功'];
        }
        // halt($data);
     }

     public function pass($data)
     {
        $validate=Loader::validate('Regist');
        if(!$validate->scene('pass')->check($data))
        {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $data['old_password']=md5($data['old_password']);
        $userInfo=$this->where('userid',\session('userid'))->find();
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'错误，账号不存在'];
        }
        else if($userInfo['password']!=$data['old_password'])
        {
            return ['valid'=>0,'msg'=>'初始密码错误'];
        }
        else{
            $this->save(['password' => md5($data['password'])],
            [$this->pk => session('userid')]);
            return ['valid'=>1,'msg'=>'修改密码成功'];
        }
     }
}
