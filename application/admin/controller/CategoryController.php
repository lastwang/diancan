<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Category;

/**
 * 栏目管理
 * Category
 * @package app\admin\controller
 */

class CategoryController extends Controller
{

    protected $db;
    protected function _initialize()
    {
        parent::_initialize();
        $this->db=new Category();
    }

    public function index()
    {
        /**
         * 获取栏目的数据
         */
        // $field=db('cate')->select();
        $field=$this->db->getAll();
        // halt($field);
        $this->assign('field',$field);
        return $this->fetch();
    }
    /**
     * add
     */
    public function store()
    {
        if(request()->isPost())
        {
            // \halt(input('post.'));
            $res=$this->db
                ->stroe(input('post.'));
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
        return $this->fetch();
    }

    /**
     * 添加子集
     */
    public function addSon()
    {
        if(request()->isPost())
        {
            $res=$this->db
                ->stroe(input('post.'));
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
        $cate_id=input('param.cateid');
        $data=$this->db->where('id',$cate_id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * edit
     */
    public function edit()
    {
        if(request()->isPost())
        {
            $res=$this->db
                ->edit(input('post.'));
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

        /**
         * 接受id
         */
        $cate_id=input('param.cateid');
        $oldData=$this->db->find($cate_id);
        /**
         * id 与 pid的关系
         * id不能等于pid
         * 儿子属于父亲的同时，父亲不能属于儿子
         * 处理数据分页不能包含自己和其子集
         */
        $cateData=$this->db->getCateData($cate_id);
        $this->assign('oldData',$oldData);
        $this->assign('cateData',$cateData);
        return $this->fetch();
    }

    public function del()
    {
        $res=$this->db->del(input('get.cate_id'));
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
        // halt(input('get.cate_id'));
        // $data=input('param.cate_id');
        // dump($data);
    }
}
