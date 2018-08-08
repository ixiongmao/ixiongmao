<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    //设置表
    public $table = 'u_feedbacks';
    //设置主键
    public $primarykey = 'id';

    public function UsersInfo()
    {   //这个里面的App\Models\Admin\UsersModel字段 存的是当前$this 表当中的主键
        return $this->hasOne('App\Models\Admin\UsersModel','id','uid');
    }
}
