<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/8
 * Time: 14:50
 */
namespace app\home\validate;
use think\Validate;

class Owner extends Validate{
    protected $rule=[
        ['name', 'require|length:1,10', '姓名不能为空|姓名长度不能超过10个字符'],
        ['sex','require','性别必填!'],
        ['age','require','年龄必填!'],
        ['tel','require|length:1,11','电话号码不能为空!|长度不能超过11位'],
        ['roomd','require|length:1,11','房号不能为空!|长度不能超过11位'],
        ['ship','require','关系必填!'],
        ['card','require|length:1,18','身份证必填!|长度不能超过18位'],
    ];
}