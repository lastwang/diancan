<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

class VegetableController extends Controller
{
    public function index()
    {
        $data = db("order")->alias("a")
        ->join("article b","a.menu_id=b.articleid and b.recovery=2","left")
        ->field("a.table_id,a.number,a.sendtime,a.isfuqian,b.articleid,b.title,b.price")
        ->where("a.islikai",0)
        ->order('a.table_id','desc')
        ->paginate(10);
        // halt($data);
        $this->assign("field",$data);
        return $this->fetch();
    }
    public function pass()
    {
        $tableId = \input("param.table_id");
        $res1 = Db::table("order")->where("table_id",$tableId)->setField('islikai', 1);
        $res2 = Db::table("table")->where("id",$tableId)->setField('iskong', 0);
 
        if($res1 != 0 && $res2 != 0)
        {
            $this->success("操作成功","admin/Vegetable/index");
            exit;
        }
        else
        {
            $this->error("操作失败");
            exit;
        }
    }
}
