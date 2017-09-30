<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/29
 * Time: 14:17
 */
namespace app\admin\validate;
use think\Validate;
class Property extends Validate{
    protected $rule = [
        ['name', 'require', '标题不能为空'],
        ['tel', 'require', '号码不能为空'],
        ['address', 'require', '地址不能为空'],
        ['problem', 'require', '地址不能为空'],
        ['content', 'require', '问题不能为空']
    ];
}