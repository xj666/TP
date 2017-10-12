<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/8
 * Time: 16:21
 */
namespace app\admin\controller;
class Owner extends Admin{
    public function index(){
        $list = \think\Db::name('owner')->paginate(2);
        $this->assign('list',$list);
        $this->assign('meta_title','业主认证');
        return $this->fetch();
    }
}