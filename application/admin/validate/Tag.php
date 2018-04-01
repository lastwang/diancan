<?php

namespace app\admin\validate;

use think\Validate;

class Tag extends Validate
{
    protected $rule=['tagname'=>'require|max:80'];
    protected $message=[
        'tagname.require'=>'标签名称不为空',
        'tagname.max'=>'名称太长'
    ];
}