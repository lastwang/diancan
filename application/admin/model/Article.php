<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected $pk='articleid';
    protected $table='article';
    protected $auto=['admin_id'];
    protected $insert=['sendtime','updatetime'];
    protected $update=['updatetime'];

    protected function setAdminIdAttr($value)
    {
        return \session('admin.id');
    }

    protected function setSendTimeAttr($value)
    {
        return date("Y-m-d");
    }

    protected function setUpdateTimeAttr($value)
    {
        return date("Y-m-d");        
    }

    public function store($data)
    {
        // halt($data);
        if(!isset($data['tag']))
        {
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $result=$this->validate(true)->allowField(true)->save($data);
        if($result)
        {
            foreach($data['tag'] as $k => $v)
            {
                $ArcTagDate = [
                    'tag_tagid'=>$v,
                    'article_articleid'=>$this->articleid
                ];
                (new \app\admin\model\ArcTag())->save($ArcTagDate);
            }
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /**
     * 获取文章的首页数据
     */
    public function getAll($isRecycle)
    {
        $data = db('article')->alias('a')
            ->where('a.recovery',$isRecycle)
            ->field('a.articleid,a.title,a.thumb,a.author,a.price,a.sendtime,a.updatetime')
            ->order('a.price,a.sendtime,a.articleid')
            ->paginate(5);
        return $data;
    }

    public function getAll2()
    {
        $data = db('article')
        ->where('recovery',2)
        ->select();
        return $data;
    }

    public function changeSort($data)
    {
        $result=$this->validate([
            'price'=>'require|between:1,9999'
        ],
        [
            'price.require'=>'请输入排序',
            'price.between'=>'数字必须在1~9999之间'
        ])->save($data,[$this->pk=>$data['articleid']]);
        if($result)
        {
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function edit($data)
    {
        if(!isset($data['tag']))
        {
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $result=$this->validate(true)->allowField(true)->save($data,[$this->pk=>$data['arctileid']]);
        
        if($result||($data['arctileid']!=null))
        {
            //首先将原有的变迁数据删除
            db('arc_tag')->where('article_articleid',$data['arctileid'])->delete();

            foreach($data['tag'] as $k => $v)
            {
                $ArcTagDate = [
                    'tag_tagid'=>$v,
                    'article_articleid'=>$data['arctileid']
                ];
                (new \app\admin\model\ArcTag())->save($ArcTagDate);
            }
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    //彻底删除
    public function del($arc_id)
    {
        //文章删除
        if(\app\admin\model\Article::destroy($arc_id))
        {
            //文章中间表删除
            \app\admin\model\ArcTag::destroy(['article_articleid'=>$arc_id]);
            //(new ArcTag())->where('article_articleid',$arc_id)->delete();//或者这样写
            return ['valid'=>1,'msg'=>'删除成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }

    }
}
