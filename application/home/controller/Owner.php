<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/8
 * Time: 14:06
 */
namespace app\home\controller;
use think\Controller;

class Owner extends Home{
    public function add(){
        if(request()->isPost()){
            //实例化模型
            $repair = model('owner');
            //接收数据
            $post_data=\think\Request::instance()->post();
            //var_dump($post_data);exit;
            //自动验证
            $validate = validate('owner');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            //$post_data['create_time']=time();
            //var_dump($post_data);exit;
            //保存数据库
            $data = $repair->insert($post_data);
            //判断是否添加成功
            if($data){
                $this->success('认证提交中', url('index'));
            } else {
                $this->error($repair->getError());
            }
        }
        $this->assign('info',null);
        $this->assign('meta_title', '新增认证');
        return $this->fetch('add');
    }
}