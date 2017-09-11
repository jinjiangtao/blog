<?php
/**
 * Created by PhpStorm.
 * User: jiangtao
 * Date: 17/9/2
 * Time: 上午9:47
 */
namespace App\Common;

class Utility
{
    public $createTime;

    public function __construct()
    {
        $this->createTime = microtime();
    }

    public function sayHello()
    {
        echo "say hello";
    }
}