<?php

namespace app\admin\model;

use think\Model;
use app\admin\validate;
use houdunwang\arr\Arr;

class Category extends Model
{
    protected $pk='id';
    protected $table='cate';
 
    /**
     * 获取分类数据[树状结构]
     */
    public function getAll()
    {
        /**
         * 参数                   说明
         *  $data                 	数组
         *  $title                	字段名称
         *  $fieldPri             	主键 id
         * $fieldPid             	父 id
         */
        //参考hdphp手册tree[hdphp.com]数组增强
        // halt(db('cate')->order('sort desc,id')->select());
        return Arr::tree(db('cate')->order('sort desc,id')->select(), 'name', $fieldPri = 'id', $fieldPid = 'pid');
    }

    public function stroe($data)
    {
        $result = $this->validate(true)->save($data);
        if(false === $result)
        {
            // 验证失败 return错误信息
            return ['valid'=>0,'msg'=>$this->getError()];
        }
        else
        {
            return ['valid'=>1,'msg'=>'添加成功'];
        }
    }

    /**
     * 处理分页
     */
    public function getCateData($cate_id)
    {
        //找到$cate_id子集
        $cate_ids=$this->getSon(db('cate')->select(),$cate_id);
        //将自己追加进去
        $cate_ids[]=$cate_id;
        // dump($cate_ids);
        //找到除了他们之外的数据并变成tree结构
        $field=db('cate')->whereNotIn('id',$cate_ids)->select();//多条上数据用select;一条用find;
        // halt($field);
        return Arr::tree($field, 'name', $fieldPri = 'id', $fieldPid = 'pid');
    }

    /**
     * 找到$cate_id子集
     */
    public function getSon($data,$cate_id)
    {
        static $temp=[];
        foreach($data as $key=>$value)
        {
            if($cate_id==$value['pid'])
            {
                $temp[]=$value['id'];
                $this->getSon($data,$value['id']);
            }
        }
        return $temp;
    }

    public function edit($data)
    {
        // halt($data);
        $result = $this->validate(true)->save($data,[$this->pk=>$data['id']]);
        // halt($result);
        if($result)
        {
            return ['valid'=>1,'msg'=>'更新成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}
