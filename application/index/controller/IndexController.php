<?php

namespace app\index\controller;

class IndexController extends CommonController
{
    public function index()
    {
        $headTitle=['title'=>'博客首页'];
        $this->assign('headTitle',$headTitle);

        $articleData=db('article')->alias('a')
            ->join('__CATE__ c','a.cate_id=c.id')->where('a.recovery',2)->order('sendtime desc')->select();//->join('cate c','a.cate_id=c.id')->select();
        foreach($articleData as $k=>$v)
        {
            $articleData[$k]['tag']=db('arc_tag')->alias('at')
            ->join('__TAG__ t','at.tag_tagid=t.tagid')->where('at.article_articleid',$v['articleid'])
            ->field('t.tagid,t.tagname')->select();
        }
        $this->assign('articleData', $articleData);
        return $this->fetch();
    }
}
