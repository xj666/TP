<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/8
 * Time: 14:23
 */
namespace app\home\validate;
use think\Validate;

class Repair extends Validate{
    protected $rule=[
        ['name', 'require|length:1,10', '姓名不能为空|姓名长度不能超过10个字符'],
        ['address','require','地址不能为空!'],
        ['tel','require|length:1,11','电话号码不能为空!|长度不能超过11位'],
    ];
}