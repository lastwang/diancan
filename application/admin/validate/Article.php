<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule=[
        'title'=>'require',
        'author'=>'require',
        'price'=>'require|between:1,9999',
        'cate_id'=>'notIn:0',
        'thumb'=>'require',
        'abstract'=>'require',
        'content'=>'require'
    ];
    
    protected $message=[
        'title.require'=>'请输入文章标题',
        'author.require'=>'请输入文章作者',
        'price.require'=>'请输入文章排序',
        'price.between'=>'排序数字必须1~9999',
        'cate_id.notIn'=>'请选择文章分类',
        'thumb.require'=>'请上传文章图片',
        'abstract.require'=>'请输入文章摘要',
        'content.require'=>'请输入文章的内容'
    ];
}