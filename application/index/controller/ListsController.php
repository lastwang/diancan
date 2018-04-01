<?php

namespace app\index\controller;

class ListsController extends CommonController
{
    public function index()
    {
        $headTitle=['title'=>'博客列表页'];
        $this->assign('headTitle',$headTitle);

        /**获取左侧第一部分的数据 */
        $cate_id=input('param.cate_id');
        $tag_id=input('param.tag_id');
        if($cate_id)
        {
            //当前分类的所有子集分类的id
            $cids=(new \app\admin\model\Category())->getSon(db('cate')->select(),$cate_id);
            $cids[]=$cate_id;//把自己追加进去
            $headData=[
                'title'=>'分类',
                'name'=>db('cate')->where('id',$cate_id)->value('name'),
                'total'=>db('article')->whereIn('cate_id',$cids)->count()
            ];

            /**获取文章数据 */
            $articleData=db('article')->alias('a')
                ->join('__CATE__ c','a.cate_id=c.id')->where('a.recovery',2)->whereIn('a.cate_id',$cids)->order('sendtime desc')->select();//->join('cate c','a.cate_id=c.id')->select();

        }
        if($tag_id)
        {
            $headData=[
                'title'=>'标签',
                'name'=>db('tag')->where('tagid',$tag_id)->value('tagname'),
                'total'=>db('arc_tag')->where('tag_tagid',$tag_id)->count()
            ];
            

            /**获取文章数据 */
            $articleData=db('article')->alias('a')->join('arc_tag at','a.articleid=at.article_articleid')
                ->join('cate c','c.id=a.cate_id')->where('a.recovery',2)->where('at.tag_tagid',$tag_id)->select();
            
            
        }

        foreach($articleData as $k=>$v)
        {
            $articleData[$k]['tag']=db('arc_tag')->alias('at')
            ->join('__TAG__ t','at.tag_tagid=t.tagid')->where('at.article_articleid',$v['articleid'])
            ->field('t.tagid,t.tagname')->select();
        }
        $this->assign('headData',$headData);
        $this->assign('articleData',$articleData);

        return $this->fetch();
    }
}
