<?php
namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule=[
        'linkName'=>'require',
        'linkUrl'=>'require',
        'linkSort'=>'require|between:1,9999',
    ];
    
    protected $message=[
        'linkName.require'=>'请输入友链名称',
        'linkUrl.require'=>'请输入url地址',
        'linkSort.require'=>'请输入友链排序',
        'linkSort.between'=>'排序数字必须1~9999',
    ];
}