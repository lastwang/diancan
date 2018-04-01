<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Tag;

class TagController extends Controller
{
    protected $db;
    protected function _initialize()
    {
        parent::_initialize();
        $this->db=new Tag();
    }

    //
    public function index()
    {
        // $field=$this->db->select();
        //// 查询所有数据 并且每页显示10条数据
        $field=db('tag')->paginate(4);
        $page=$field->render();
        $this->assign('field',$field);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //
    public function store()
    {
        $tagid=input('param.tagid');
        if(request()->isPost())
        {
            // $res=(new Tag())->store(input('post.'));
            $res=$this->db->store(input('post.'));
            if($res['valid'])
            {
                return $this->success($res['msg'],'index');
                exit;
            }
            else
            {
                return $this->error($res['msg']);
                exit;
            }
        }
        if($tagid)
        {
            $oldDate=$this->db->where('tagid',$tagid)->find();
        }
        else
        {
            $oldDate=['tagname'=>''];
        }
      
        $this->assign('oldDate',$oldDate);
        return $this->fetch();
    }

    // public function edit()
    // {
    //     if(request()->isPost())
    //     {
    //         $res=$this->db->edit(input('post.'));
    //         if($res['valid'])
    //         {
    //             return $this->success($res['msg'],'index');
    //             exit;
    //         }
    //         else
    //         {
    //             return $this->error($res['msg']);
    //             exit;
    //         }
    //     }
    //     $tagid=input('param.tagid');
    //     $field=$this->db->where('tagid',$tagid)->find();
    //     $this->assign('field',$field);
    //     return $this->fetch();
    // }

    public function pass()
    {
        // halt(input('get.'));
        $res=$this->db->pass(input('get.tag_id'));
        if($res['valid'])
        {
            return $this->success($res['msg'],'index');
            exit;
        }
        else
        {
            return $this->error($res['msg']);
            exit;
        }
    }
}
