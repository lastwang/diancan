<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class CommonController extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        //相当于session['admin']['admin_id'](tp5里这样不行)
        if (!session('admin.id')) {
            //$this->fetch("login/index");
            $this->redirect('admin/login/login');
        }
    }
}
