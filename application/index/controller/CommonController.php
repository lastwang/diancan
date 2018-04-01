<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class CommonController extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        
        /**1.读取配置项的数据 */
        $webset = $this->loadWebSet();
        $this->assign('_webset',$webset);

        /**2.获取顶级分类数据 */
        $cateData = $this -> loadCateData();
        $this->assign('_cateData',$cateData);

        /**3.获取全部分类数据 */
        $allCateData = $this -> loadAllCateData();
        $this -> assign('_allCateData',$allCateData);
       
        /**4.获取标签数据 */
        $tagData = $this -> loadTagData();
        $this->assign('_tagData',$tagData);

        /**5.获取最新文章 */
        $articleData= $this->loadArticleData();
        $this->assign('_articleData',$articleData);

        /**6.获取友情链接 */
        $linkData= $this->loadLinkData();
        $this->assign('_linkData',$linkData);

        // halt($cateData);
        // if (!session('useremail')) {
        //     $this->redirect('index/login/login');
        // }
    }

    /**1.读取配置项的数据 */
    private function loadWebSet()
    {
        return db('webset')->column('websetValue','websetName');
    }

    /**2.获取顶级分类数据 */
    private function loadCateData()
    {
        return db('cate')->where('pid',0)->order('sort desc')->limit(3)->select();
    }

    /**3.获取全部分类数据 */
    private function loadAllCateData()
    {
        return db('cate')->order('sort desc')->select();
    }

    /**4.获取标签数据 */
    private function loadTagData()
    {
        return db('tag')->order('tagid desc')->select();
    }

    /**5.获取最新文章 */
    private function loadArticleData()
    {
        return db('article')->order('sendtime desc')->limit(2)->field('articleid,title,updatetime')->select();
    }

    /**6.获取友情链接 */
    private function loadLinkData()
    {
        return db('link')->order('linkSort desc')->limit(2)->select();
    }
}