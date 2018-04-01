<?php

namespace app\index\controller;

class ContentController extends CommonController
{
    public function index()
    {
        //文章的点击次数
        
        $articleid=input("param.articleid");
        if($articleid)
        {
            db('article')->where('articleid',$articleid)->setInc('clicks');

            $articleData=db('article')
                ->field('articleid,title,author,content,sendtime,updatetime')
                ->find($articleid);

            $headTitle=['title'=>'博客文章--'.$articleData['title']];
            $this->assign('headTitle',$headTitle);

            $articleData['tag']=db('arc_tag')->alias('at')->join('tag t','at.tag_tagid=t.tagid')
                ->where('at.article_articleid',$articleid)->select();
            // halt($articleData);
            $this->assign('articleData',$articleData);
        }
        return $this->fetch();
    }
}
