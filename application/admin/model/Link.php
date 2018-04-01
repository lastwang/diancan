<?php

namespace app\admin\model;

use think\Model;

class Link extends Model
{
    protected $pk="linkId";
    protected $table="link";

    public function getAll()
    {
        return $this->order('linkSort desc,linkId desc')->paginate(1);
    }

    public function store($data)
    {
        // halt($data);
        $result = $this->validate(true)->save($data,$data['linkId']);
        if($result)
        {
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}
