<?php
namespace app\index\validate;

use think\Validate;

class Regist extends Validate
{//,'邮箱不能为空|邮箱格式不正确''密码不能为空|密码必须6位以上'
    protected $rule = [
        'useremail' =>'require|email',
        'old_password' => 'require|min:6',
        'password' => 'require|min:6',
        'password_confirmation' => 'require|confirm:password'
    ];
    protected $message=[
        'useremail.require'=>'email不能为空',
        'useremail.email'=>'邮箱格式不正确',
        'old_password.require'=>'初始密码不能为空',
        'old_password.min'=>'初始密码必须6位以上',
        'password.require'=>'密码不能为空',
        'password.min'=>'密码必须6位以上',
        'password_confirmation.require'=>'确认密码不能为空',
        'password_confirmation.confirm'=>'密码与确认密码不一至'
    ];
    protected $scene=[
        'login'=> ['useremail','password'],
        'pass'=>['old_password','password','password_confirmation']
    ];
    /**
     * 自定义验证
     */
    // protected function checkEmail()
    // {
    //     \halt('dsa');
    // }
}