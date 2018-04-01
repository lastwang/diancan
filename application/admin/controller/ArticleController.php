<?php

namespace app\admin\controller;
use app\admin\model;

use think\Controller;

class ArticleController extends Controller
{
    protected $db;
    protected function _initialize()
    {
        parent::_initialize();
        $this->db=new model\Article();
    }

    public function index()
    {
        $field = $this->db->getAll(2);
        $this->assign('field',$field);
        return $this->fetch();
    }

    public function store()
    {
        if(\request()->isPost())
        {
            $res=$this->db->store(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'index');
                exit;
            }
            else
            {
                $this->error($res['msg']);
                exit;
            }
        }
        /**分类数据 */
        $cateDate=(new model\Category())->getAll();
        $this->assign('cateDate',$cateDate);
        /**标签数据 */
        $tagDate=(new model\Tag())->select();
        // halt($tagDate);
        $this->assign('tagDate',$tagDate);
        return $this->fetch();
    }

    /**
     * 修改sort post方法
     */
    public function changeSort()
    {
        if(\request()->isAjax())
        {
            $res=$this->db->changeSort(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'index');
                exit;
            }
            else
            {
                $this->error($res['msg']);   
                exit;             
            }
        }
    }

    public function edit()
    {   
        if(\request()->isPost())
        {
            $res=$this->db->edit(input('post.'));//$res=$this->db->edit(input('param.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'index');
                exit;
            }
            else
            {
                $this->error($res['msg']);
                exit;
            }
        }

        $arc_id=input('param.articleid');

        /**分类数据 */
        $cateDate=(new model\Category())->getAll();
        $this->assign('cateDate',$cateDate);

        /**标签数据 */
        $tagDate=(new model\Tag())->select();
        $this->assign('tagDate',$tagDate);

        //获取旧数据
        $oldData=$this->db->find($arc_id);// $oldData=$this->db->where('articleid',$arc_id)->find();
        $this->assign('oldData',$oldData);

        //获取当前文章的所有的标签id
        $tag_ids=db('arc_tag')->where('article_articleid',$arc_id)->column('tag_tagid');
        $this->assign('tag_ids',$tag_ids);

        return $this->fetch();
    }

    //将数据移入回收站
    public function delToRecycle()
    {
        $arc_id=input("param.articleid");
        if($this->db->update(['recovery'=>1],['articleid'=>$arc_id]))
        {
            $this->success("操作成功","index");
            exit;
        }
        else
        {
            $this->error("操作失败");
            exit;
        }
    }

    //恢复数据
    public function outToRecycle()
    {
        $arc_id=input("param.articleid");
        if($this->db->update(['recovery'=>2],['articleid'=>$arc_id]))
        {
            $this->success("操作成功","recycle");
            exit;
        }
        else
        {
            $this->error("操作失败");
            exit;
        }
    }

    /**
     * 回收站管理
     */
    public function recycle()
    {
        $field = $this->db->getAll(1);
        $this->assign('field',$field);
        return $this->fetch();
    }

    //彻底删除数据
    public function del()
    {
        $arc_id = input("get.arc_id");
        $res=$this->db->del($arc_id);
        if($res['valid'])
        {
            $this->success($res['msg'],'recycle');
            exit;
        }
        else
        {
            $this->error($res['msg']);
            exit;
        }
    }
}