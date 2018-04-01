<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Link;

class LinkController extends Controller
{
    protected $db;
    public function _initialize()
    {
        parent::_initialize();
        $this->db = new Link();
    }
    public function index()
    {
        $data = $this->db->getAll();
        $this->assign('field',$data);
        return $this->fetch();
    }

    //添加
    public function store()
    {
        $linkId = input('param.linkId');
        if(request()->isPost())
        {
            $res = $this->db->store(input("post."));
            if($res['valid'])
            {
                $this->success($res['msg'],'index');
                exit;
            }
            else
            {
                $this->error($res['msg']);
            }
        }   
         
        if($linkId)
        {
            //编辑
            //$oldData=db('link')->where('linkId',$linkId)->find();
            $oldData=$this->db->find($linkId);            
        }
        else
        {
            $oldData=['linkName'=>'','linkUrl'=>'','linkSort'=>100];
        }
        $this->assign('oldData',$oldData);
        return $this->fetch();
    }
    //删除
    public function pass()
    {
        $linkId=input("get.linkId");
        if(\app\admin\model\Link::destroy($linkId))
        {
            $this->success('删除成功','index');
            exit;
        }
        else
        {
            $this->error('删除失败');
            exit;
        }
    }

}
