<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule=[
        'name'=>'require',
        'sort'=>'require|number|between:1,9999'
    ];
    protected $message=[
        'name.require'=>'请填写栏目名称',
        'sort.require'=>'请输入排序',
        'sort.number'=>'排序必须为数字',
        'sort.between'=>'排序需要在1~9999之间'
    ];
}