<?php
// app命名空间代表文件其实目录为application
namespace app\demo\controller;
// think命名空间代表文件起始目录为thinkphp\library\think
use think\Controller;
// 后面的命名空间则表示起始目录开始的子目录

class Article extends Controller
{
    public function article()
    {
        return $this->fetch('article');
    }
}
