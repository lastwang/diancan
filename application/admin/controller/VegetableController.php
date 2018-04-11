<?php

namespace app\admin\controller;

use think\Controller;

class VegetableController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
