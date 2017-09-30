<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/29
 * Time: 10:52
 */
namespace app\admin\controller;
class Property extends Admin{
    /**
     * @return mixed
     */
    public function Index(){
        //获取数据
        $map = array('status'=>array('gt',-1));
        //$list = \think\Db::name('property')->where($map)->select();
        $list = \think\Db::name('property')->where($map)->select();
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()) {
            $Property = model('property');
             //var_dump($Property);exit();
            $post_data = \think\Request::instance()->post();
            $post_data['guarantee']=date("Ymd",time()).sprintf('%05d',rand(1000,9999));
            $post_data['create_time']=time();

            $validate = validate('property');
            if (!$validate->check($post_data)) {
                return $this->error($validate->getError());
            }
            //var_dump(1);exit();
            $data = $Property->create($post_data);
            //var_dump(1);exit();
            if ($data) {
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_property', 'property', $data->id, UID);
            } else {
                $this->error($Property->getError());
            }
        }else{
            $this->assign('info',null);
            return $this->fetch('edit');
        }
    }
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Property = \think\Db::name("property");
           // var_dump($Property);exit();
           // $Property->updata($postdata)
            $data =$Property->update($postdata) ;
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        }else{
            $info = array();
            $info = \think\Db::name('property')->find($id);
            if (false === $info){
                $this->error('配置错误');
            }
        }
        $this->assign('info', $info);
        $this->meta_title = '编辑导航';
        return $this->fetch();
        }

    public function del(){
        $id = array_unique((array)input('id/a',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('property')->where($map)->delete()){
            //记录行为
            action_log('update_property', 'property', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}