<?php

namespace app\admin\model;

use think\Model;
use think\Loader;

class Tag extends Model
{
    protected $pk='tagid';
    protected $name='tag';

    public function store($data)
    {
        // halt($data);
        if($this->validate(true)->save($data,$data['tagid']))
        {
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function pass($tag_id)
    {
        if(Tag::destroy($tag_id))
        {
            return ['valid'=>1,'msg'=>'删除成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>'删除失败'];
        }
    }

    // public function edit($data)
    // {
    //     // $result=$this->validate(true)->update($data);
    //     $validate=Loader::validate('Tag');
    //     if($validate->check($data))
    //     {
    //         $result=$this->update($data);
    //         if($result)
    //         {
    //             return ['valid'=>1,'msg'=>'更新成功'];
    //         }
    //         else
    //         {
    //             return ['valid'=>0,'msg'=>$this->error()];
    //         }
    //     }
    //     else
    //     {
    //         return ['valid'=>0,'msg'=>$validate->getError()];
    //     }
    // }
}
