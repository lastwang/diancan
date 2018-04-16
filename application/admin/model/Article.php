<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected $pk='articleid';
    protected $table='article';
    protected $auto=['admin_id'];
    protected $insert=['sendtime','updatetime'];
    protected $update=['updatetime'];

    protected function setAdminIdAttr($value)
    {
        return \session('admin.id');
    }

    protected function setSendTimeAttr($value)
    {
        return date("Y-m-d h:i:s");
    }

    protected function setUpdateTimeAttr($value)
    {
        return date("Y-m-d h:i:s");        
    }

    public function store($data)
    {
        // halt($data);
        if(!isset($data['tag']))
        {
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $result=$this->validate(true)->allowField(true)->save($data);
        if($result)
        {
            foreach($data['tag'] as $k => $v)
            {
                $ArcTagDate = [
                    'tag_tagid'=>$v,
                    'article_articleid'=>$this->articleid
                ];
                (new \app\admin\model\ArcTag())->save($ArcTagDate);
            }
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /**
     * 获取文章的首页数据
     */
    public function getAll($isRecycle)
    {
        $data = db('article')->alias('a')
            ->where('a.recovery',$isRecycle)
            ->field('a.articleid,a.title,a.thumb,a.author,a.price,a.sendtime,a.updatetime')
            ->order('a.price,a.sendtime,a.articleid')
            ->paginate(5);
        return $data;
    }

    public function getAll2()
    {
        $data = db('article')
        ->where('recovery',2)
        ->select();
        return $data;
    }

    public function getData1($data)
    {
        $data = json_decode($data,true);
        $result = $this->where("recovery",2)->select();
        $money = 0;
        $t=null;
        $t=db("table")->where("iskong",0)->find();
        if($t == null)
        {
            return ["state"=>0,"msg"=>"桌子已经满了,请等待"];
        }
        $tary = $t;
        // halt($t);
        foreach($result as $value)
        {
            foreach($data as $k=>$v)
            {
                if($value->data["articleid"]==$v["id"])
                {
                    $money += $value->data["price"]*$v["number"];
                }
            }
        }
        $ti = date("Y-m-d h:i:s"); 
        // halt($ti);
        if($money != 0)
        {
            $tmp = ['websetName'=>$ti,'websetdes'=>$money];

            $res=db("webset")->insert($tmp);
        }

        $name;
        foreach($data as $v)
        {
            $in = ["table_id"=>$tary["id"],"menu_id"=>$v['id'],"sendtime"=>$ti,"number"=>$v['number']];
            db("order")->insert($in,true);
            db("table")->update(["id"=>$tary["id"],"iskong"=>1]);
            $temp=db("article")->where('articleid',$v['id'])->field("title")->find();
            $name[]=["name"=>$temp["title"],'number'=>$v["number"]];
        }
        
        return ["state"=>1,"msg"=>"下单成功","tableid"=>$tary["id"],"name"=>$name,"price"=>$money];
    }

        /**
     * 指定位置插入字符串
     * @param $str  原字符串
     * @param $i    插入位置
     * @param $substr 插入字符串
     * @return string 处理后的字符串
     */
    function insertToStr($str, $i, $substr){
        //指定插入位置前的字符串
        $startstr="";
        for($j=0; $j<$i; $j++){
            $startstr .= $str[$j];
        }
        //指定插入位置后的字符串
        // $laststr="";
        // for ($j=$i; $j<strlen($str); $j++){
        //     $laststr .= $str[$j];
        // }
        //将插入位置前，要插入的，插入位置后三个字符串拼接起来
        $str = $startstr . $substr . $laststr;
        //返回结果
        return $str;
    }

    public function changeSort($data)
    {
        $result=$this->validate([
            'price'=>'require|between:1,9999'
        ],
        [
            'price.require'=>'请输入排序',
            'price.between'=>'数字必须在1~9999之间'
        ])->save($data,[$this->pk=>$data['articleid']]);
        if($result)
        {
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function edit($data)
    {
        if(!isset($data['tag']))
        {
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $result=$this->validate(true)->allowField(true)->save($data,[$this->pk=>$data['arctileid']]);
        
        if($result||($data['arctileid']!=null))
        {
            //首先将原有的变迁数据删除
            db('arc_tag')->where('article_articleid',$data['arctileid'])->delete();

            foreach($data['tag'] as $k => $v)
            {
                $ArcTagDate = [
                    'tag_tagid'=>$v,
                    'article_articleid'=>$data['arctileid']
                ];
                (new \app\admin\model\ArcTag())->save($ArcTagDate);
            }
            return ['valid'=>1,'msg'=>'操作成功'];
        }
        else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    //彻底删除
    public function del($arc_id)
    {
        //文章删除
        if(\app\admin\model\Article::destroy($arc_id))
        {
            //文章中间表删除
            \app\admin\model\ArcTag::destroy(['article_articleid'=>$arc_id]);
            //(new ArcTag())->where('article_articleid',$arc_id)->delete();//或者这样写
            return ['valid'=>1,'msg'=>'删除成功'];
        }
        else
        {
            return ['valid'=>0,'msg'=>$this->getError()];
        }

    }
}
