<?php

namespace app\admin\model;

use think\Model;

class Webset extends Model
{
    protected $pk='websetId';
    protected $table='webset';

    public function change($data)
    {
        $result=$this->validate([
            'websetValue'=>'require'
        ],[
            'websetValue.require'=>'请输入站点配置值'
        ])->save($data,[$this->pk=>$data['websetId']]);   
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
