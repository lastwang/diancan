<?php

namespace app\system\controller;

use think\Controller;
use \think\Db;

class ComponentController extends Controller
{
    public function uploader()
    {
       $file=\request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $fileIn=strtr($info->getSaveName(),['\\'=>'/']);
        //http://www.blog.wang.com/
        // halt($fileIn);
        if($info){
            $data=[
                'name'=>input('post.name'),
                'filename'=> $info->getFilename(),
                'path' =>SITE_URL.'/'.'uploads/'.$fileIn,
                'extensions'=>$info->getExtension(),
                'createtime'=>date("Y/m/d"),
                'size'=>$file->getSize()
            ];

            Db::name('attachment')->insert($data);

            echo json_encode(['valid'=>1,'message'=>$data['path']]);
            exit;
        }
        else{
             echo $file->getError();
             exit;
        }
    }

    public function filesLists()
    {
        // halt(HD_ROOT);
        $db=Db::name('attachment')
            ->whereIn('extensions',explode(',',strtolower(input('post.extensions'))))
            ->order('id desc');
        // halt($db);
        $Res=$db->paginate(5);
        $data=[];
        if($Res->toArray())
        {
            // halt($Res->toArray());
            foreach ($Res as $k => $v) {
                $data[$k]['createtime']=$v['createtime'];
                $data[$k]['size']=$v['size'];
                $data[$k]['url']=$v['path'];
                $data[$k]['path']=$v['path'];
                $data[$k]['name']=$v['name'];
            }
        }
        $json = ['data' => $data, 'page' => $Res->render() ? :''];
        echo (json_encode($json));
    }
}
