<?php

namespace app\admin\controller;

use think\Controller;

class WebsetController extends Controller
{
    protected $db;
    public function _initialize()
    {
        parent::_initialize();
        $this->db = new \app\admin\model\Webset();
    }
    public function index()
    {
        $field = db('webset')->paginate(10);
        $this->assign('field',$field);
        return $this->fetch();
    }

    public function chang()
    {
        if(\request()->isAjax())
        {
            $res=$this->db->change(input('post.'));
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
}
